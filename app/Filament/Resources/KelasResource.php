<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelasResource\Pages;
use App\Filament\Resources\KelasResource\RelationManagers;
use App\Models\Kelas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelasResource extends Resource
{
    protected static ?string $model = Kelas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                ->required(),
                Forms\Components\TextInput::make('kode_kelas')
                ->required(),
                Forms\Components\Select::make('id_guru')
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('kode_kelas'),
                Tables\Columns\TextColumn::make('guru.nama')->label('Guru'),

            ])
            ->filters([
                //
            ])
            ->actions([
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKelas::route('/'),
            'create' => Pages\CreateKelas::route('/create'),
            'edit' => Pages\EditKelas::route('/{record}/edit'),
        ];
    }
}
