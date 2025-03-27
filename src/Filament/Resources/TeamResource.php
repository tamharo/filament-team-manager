<?php

namespace Manhamprod\FilamentTeamManager\Filament\Resources;

use Filament\Forms;
use Manhamprod\FilamentTeamManager\Models\Team;
use Manhamprod\FilamentTeamManager\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Manhamprod\FilamentTeamManager\Filament\Resources\TeamResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Manhamprod\FilamentTeamManager\Filament\Resources\TeamResource\RelationManagers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Htmlable;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    public static function getNavigationIcon(): string | Htmlable | null
    {
        return config("filament-team-manager.icons.team");
    }

    protected static ?string $navigationGroup = 'Team';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("name")
                    ->required(),

                Forms\Components\Hidden::make('owner_id')
                    ->default(fn () => Auth::user()->id)
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make("users_count")
                    ->label("Members")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make("is_active")
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\UsersRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'view' => Pages\ViewTeam::route('/{record}'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
