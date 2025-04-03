<?php

namespace App\Filament\Admin\Resources;

use App\Enums\Discount\TipeDiskonEnum;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Discount;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\DiscountResource\Pages;
use App\Filament\Admin\Resources\DiscountResource\RelationManagers;

class DiscountResource extends Resource
{
    protected static ?string $model = Discount::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->columns(1)
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns(1)
                            ->schema([
                                Forms\Components\TextInput::make('kode')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('persentase')
                                    ->required()
                                    ->suffix('%')
                                    ->numeric(),
                                Forms\Components\Select::make('tipe_diskon')
                                    ->options([
                                        TipeDiskonEnum::DIBATASI_TANGGAL->value => TipeDiskonEnum::DIBATASI_TANGGAL->label(),
                                        TipeDiskonEnum::DIBATASI_KUOTA->value => TipeDiskonEnum::DIBATASI_KUOTA->label(),
                                    ])
                                    ->live()
                                    ->selectablePlaceholder(false)
                                    ->default('dibatasi_tanggal')
                                    ->required(),
                                Forms\Components\DatePicker::make('tanggal_kadaluarsa')
                                    ->live()
                                    ->locale('id')
                                    ->required(fn(Get $get) => $get('tipe_diskon') === 'dibatasi_tanggal')
                                    ->hidden(fn(Get $get) => $get('tipe_diskon') === 'dibatasi_kuota')
                                    ->default(null),
                                Forms\Components\TextInput::make('batas_penggunaan')
                                    ->live()
                                    ->required(fn(Get $get) => $get('tipe_diskon') === 'dibatasi_kuota')
                                    ->hidden(fn(Get $get) => $get('tipe_diskon') === 'dibatasi_tanggal')
                                    ->numeric()
                                    ->minValue(1)
                                    ->default(1)
                                    ->default(null),
                    ])

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode')
                    ->searchable()
                    ->badge(),
                Tables\Columns\TextColumn::make('persentase')
                    ->numeric()
                    ->sortable()
                    ->getStateUsing(fn(Discount $discount) => $discount->persentase . '%')
                    ->weight(FontWeight::SemiBold),    
                    Tables\Columns\TextColumn::make('tanggal_kadaluarsa')
                        ->getStateUsing(fn(Discount $diskon) => $diskon->tipe_diskon == TipeDiskonEnum::DIBATASI_TANGGAL ? Carbon::parse($diskon->tanggal_kadaluarsa)->locale('id')->isoFormat('dddd, D MMMM Y') : '-')
                        ->sortable(),
                Tables\Columns\TextColumn::make('batas_penggunaan')
                    ->numeric()
                    ->sortable()
                    ->getStateUsing(fn(Discount $diskon) => $diskon->tipe_diskon == TipeDiskonEnum::DIBATASI_KUOTA ? $diskon->transactions->count() . '/' . $diskon->batas_penggunaan : '-'),
                Tables\Columns\TextColumn::make('status_aktif')
                    ->label('Status Keaktifan')
                    ->badge()
                    ->color(function(Discount $diskon) {
                        if($diskon->tipe_diskon === TipeDiskonEnum::DIBATASI_TANGGAL)
                        {
                            // perbandingan date dengan date sekarang
                            if($diskon->tanggal_kadaluarsa < Carbon::now())
                            {
                                return 'danger';
                            }
                        }

                        if($diskon->tipe_diskon === TipeDiskonEnum::DIBATASI_KUOTA)
                        {
                            if($diskon->batas_penggunaan <= $diskon->transactions->count())
                            {
                                return 'danger';
                            }
                        }

                        return 'success';
                    })
                    ->getStateUsing(function(Discount $diskon) {
                        if($diskon->tipe_diskon === TipeDiskonEnum::DIBATASI_TANGGAL)
                        {
                            // perbandingan date dengan date sekarang
                            if($diskon->tanggal_kadaluarsa < Carbon::now())
                            {
                                return 'Nonaktif';
                            }
                        }

                        if($diskon->tipe_diskon === TipeDiskonEnum::DIBATASI_KUOTA)
                        {
                            if($diskon->batas_penggunaan <= $diskon->transactions->count())
                            {
                                return 'Nonaktif';
                            }
                        }

                        return 'Aktif';
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->mutateFormDataUsing(function(array $data)
                    {
                        if($data['tipe_diskon'] == 'dibatasi_tanggal')
                        {
                            $data['batas_penggunaan'] = null;
                        }
                        elseif($data['tipe_diskon'] == 'dibatasi_kuota')
                        {
                            $data['tanggal_kadaluarsa'] = null;
                        }

                        return $data;
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageDiscounts::route('/'),
        ];
    }
}
