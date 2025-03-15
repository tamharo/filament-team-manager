<?php

namespace Manhamprod\FilamentTeamManager\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Manhamprod\FilamentTeamManager\Models\TeamInvitation;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Mail;
use Manhamprod\FilamentTeamManager\Mail\TeamInvitationRequestMail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Manhamprod\FilamentTeamManager\Filament\Resources\TeamInvitationResource\Pages;
use Manhamprod\FilamentTeamManager\Filament\Resources\TeamInvitationResource\RelationManagers;

class TeamInvitationResource extends Resource
{
    protected static ?string $model = TeamInvitation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Team';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make("team_id")
                    ->relationship(name: "team", titleAttribute: "name")
                    ->searchable()
                    ->preload()
                    ->required()
                    ->native(false),
                Forms\Components\Select::make("role")
                    ->options(config("filament-team-manager.roles"))
                    ->required(),
                Forms\Components\TextInput::make("email")
                    ->required(),
                Forms\Components\TextInput::make("name")
                    ->required(),

                Forms\Components\Hidden::make('token')
                    ->default(fn () => Str::random(60))
                    ->required()
                
            ]);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('team.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make("email")
                    ->searchable(),
                Tables\Columns\TextColumn::make("name")
                    ->searchable(),
                Tables\Columns\TextColumn::make("expires_at")
                    ->date(),
                Tables\Columns\IconColumn::make("expired")
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeamInvitations::route('/'),
            'create' => Pages\CreateTeamInvitation::route('/create'),
            'view' => Pages\ViewTeamInvitation::route('/{record}'),
        ];
    }
}
