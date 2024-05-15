<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Section1Resource\Pages;
use App\Filament\Resources\Section1Resource\RelationManagers;
use App\Models\Section1;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use illuminate\Support\Facades\storage;

class Section1Resource extends Resource
{
    protected static ?string $model = Section1::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\FileUpload::make('thumbnail')
                        ->required()->image()->disk('public'),
                    Forms\Components\RichEditor::make('content')
                        ->required(),
                    Forms\Components\Select::make('post_as')->options([
                        'JUMBOTRON' => 'JUMBOTRON',
                        'ABOUT' => 'ABOUT'
                    ])

                    ]),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('post_as')->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->after(function(Collection
            $records){
                foreach($records as $key => $value){
                    if($value->thumbnail){
                        storage::disk('public')->delete($value->thumbnail);
                    }
                }
            }),
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
            'index' => Pages\ListSection1s::route('/'),
            'create' => Pages\CreateSection1::route('/create'),
            'edit' => Pages\EditSection1::route('/{record}/edit'),
        ];
    }    
}
