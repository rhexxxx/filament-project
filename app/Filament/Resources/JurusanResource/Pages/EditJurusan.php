<?php

namespace App\Filament\Resources\JurusanResource\Pages;

use App\Filament\Resources\JurusanResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Pages\EditRecord;
use App\Models\Kelas;

class EditJurusan extends EditRecord
{
    protected static string $resource = JurusanResource::class;
    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('nama')
                ->required()
                ->label(''),

            // Add a heading for classes
            Forms\Components\Section::make('Classes')
                ->schema([
                    Tables\Components\Table::make('classes')
                        ->columns([
                            Tables\Columns\TextColumn::make('name')->label('Class Name'),
                        ])
                        ->query(function ($record) {
                            return Kelas::where('degree_id', $record->id);
                        }),
                ])
                ->columns(1)
                ->collapsible(),
        ];
    }
}
