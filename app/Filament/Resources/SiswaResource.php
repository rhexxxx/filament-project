<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Filament\Resources\KelasResource\RelationManagers\SiswaRelationManager;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $navigationLabel = 'Siswa';


    protected static ?string $model = Siswa::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                ->required(),                
                Forms\Components\TextInput::make('nis')
                ->required(),           
                Select::make('jurusan_id')
                ->label('Jurusan')     
                ->options(Jurusan::all()->pluck('nama', 'id'))
                ->reactive()
                ->afterStateUpdated(fn ($state, callable $set) => $set('kelas_id', null)),
                Select::make('kelas_id')
                ->label('Kelas')
                ->options(function (callable $get) {
                    $jurusanId = $get('jurusan_id');
                    if($jurusanId) {
                        return Kelas::where('jurusan_id', $jurusanId)->pluck('nama', 'id');
                    }
                    return Kelas::all()->pluck('nama', 'id');
                })
                ->required(),
                Forms\Components\TextInput::make('email')
                ->required()
                ->email(),                
                Forms\Components\TextInput::make('alamat'),                
                Forms\Components\TextInput::make('no_telp'),                

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nis'),
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('jurusan.nama')->label('Jurusan'),
                Tables\Columns\TextColumn::make('kelas.nama')->label('Kelas'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
            // 'view' => Pages\ViewSiswa::route('/{record}'),
        ];
    }
}
