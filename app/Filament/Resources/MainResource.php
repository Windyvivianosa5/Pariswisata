<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MainResource\Pages;
use App\Filament\Resources\MainResource\RelationManagers;
use App\Models\Main;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MainResource extends Resource
{
    protected static ?string $model = Main::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Main Posts';

    protected static ?string $modelLabel = 'Post';

    protected static ?string $pluralModelLabel = 'Posts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Post Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter post title'),

                        Forms\Components\Select::make('category')
                            ->label('Category')
                            ->options([
                                'koleksi_post' => 'Koleksi Post',
                                'todo_post' => 'Todo Post',
                                'wisata' => 'Wisata',
                                'hero' => 'Hero',
                            ])
                            ->required()
                            ->searchable()
                            ->placeholder('Select category'),

                        Forms\Components\FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->directory('posts')
                            ->visibility('public')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->maxSize(5120) // 5MB
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->placeholder('Upload image')
                            ->hidden(fn (Forms\Get $get) => $get('category') === 'hero'),

                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->rows(4)
                            ->maxLength(1000)
                            ->placeholder('Enter post description (optional)')
                            ->hidden(fn (Forms\Get $get) => $get('category') === 'hero'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Forms\Components\Section::make('Hero Information')
                    ->schema([
                        Forms\Components\TextInput::make('hero_title')
                            ->label('Hero Title')
                            ->maxLength(255)
                            ->placeholder('Enter hero title'),

                        Forms\Components\FileUpload::make('hero_image')
                            ->label('Hero Image')
                            ->image()
                            ->directory('hero')
                            ->visibility('public')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->maxSize(5120) // 5MB
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->placeholder('Upload hero image'),

                        Forms\Components\Textarea::make('hero_description')
                            ->label('Hero Description')
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('Enter hero description'),
                    ])
                    ->columns(1)
                    ->collapsible()
                    ->visible(fn (Forms\Get $get) => $get('category') === 'hero'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image')
                    ->hidden(fn ($record) => $record && $record->category === 'hero'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        return strlen($state) > 50 ? $state : null;
                    }),

                Tables\Columns\BadgeColumn::make('category')
                    ->label('Category')
                    ->colors([
                        'primary' => 'koleksi_post',
                        'success' => 'todo_post',
                        'warning' => 'wisata',
                        'danger' => 'hero',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'koleksi_post' => 'Koleksi Post',
                        'todo_post' => 'Todo Post',
                        'wisata' => 'Wisata',
                        'hero' => 'Hero',
                        default => $state,
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('hero_title')
                    ->label('Hero Title')
                    ->limit(30)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        return $state && strlen($state) > 30 ? $state : null;
                    })
                    ->placeholder('No hero title')
                    ->visible(fn ($record) => $record && $record->category === 'hero'),

                Tables\Columns\ImageColumn::make('hero_image')
                    ->label('Hero Image')
                    ->visible(fn ($record) => $record && $record->category === 'hero'),

                Tables\Columns\TextColumn::make('hero_description')
                    ->label('Hero Description')
                    ->limit(30)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        return $state && strlen($state) > 30 ? $state : null;
                    })
                    ->placeholder('No hero description')
                    ->visible(fn ($record) => $record && $record->category === 'hero'),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(30)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        return $state && strlen($state) > 30 ? $state : null;
                    })
                    ->placeholder('No description')
                    ->hidden(fn ($record) => $record && $record->category === 'hero'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Category')
                    ->options([
                        'koleksi_post' => 'Koleksi Post',
                        'todo_post' => 'Todo Post',
                        'wisata' => 'Wisata',
                        'hero' => 'Hero',
                    ])
                    ->multiple(),

                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Created from'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Created until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->color('info'),
                Tables\Actions\EditAction::make()
                    ->color('warning'),
                Tables\Actions\DeleteAction::make()
                    ->color('danger'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('id', 'asc')
            ->striped()
            ->poll('30s');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMains::route('/'),
            'create' => Pages\CreateMain::route('/create'),
            'edit' => Pages\EditMain::route('/{record}/edit'),
        ];
    }
}
