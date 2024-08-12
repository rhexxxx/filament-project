<?php

namespace App\Filament\Resources\JurusanResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelasRelationManager extends RelationManager
{
    protected static string $relationship = 'kelas';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                ->required(),
                Forms\Components\TextInput::make('kode_kelas')
                ->required(),
                Forms\Components\Select::make('guru_id')    
                ->relationship('guru', 'nama')
                ->searchable()
                ->preload()
                ->createOptionForm([
                    Forms\Components\TextInput::make('nama')
                    ->required(),
                    Forms\Components\TextInput::make('nip')
                    ->required(),
                    Forms\Components\TextInput::make('email')
                    ->label('Alamat Email')
                    ->email()
                    ->required(),
                    Forms\Components\TextInput::make('no_telp')
                    ->label("Nomer Telpon"),
                    Forms\Components\TextInput::make('alamat')
                ])
                ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Kelas')
            ->columns([
                Tables\Columns\TextColumn::make('kode_kelas')->label('Kode Kelas'),
                Tables\Columns\TextColumn::make('nama')->label('Kelas'),
                Tables\Columns\TextColumn::make('guru.nama')->label('Wali Kelas'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
