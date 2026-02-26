<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Orders\OrderResource;
use App\Models\Order;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;


class LatestOrders extends TableWidget
{
    protected array|string|int $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Order::query())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at' , 'desc')
            ->columns([
                TextColumn::make('id')
                ->label('Order ID')
                ->sortable(),
                TextColumn::make('user.name')
                ->searchable(),      
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match($state) {
                        'new' => 'info',
                        'processing' => 'warning',
                        'shipped' => 'success',
                        'delivered' => 'success',
                        'cancelled' => 'danger',
                    })
                    ->icon(fn (string $state): string => match($state) {
                        'new' => 'heroicon-m-sparkles',
                        'processing' => 'heroicon-m-arrow-path',
                        'shipped' => 'heroicon-m-truck',
                        'delivered' => 'heroicon-m-check-badge',
                        'cancelled' => 'heroicon-m-x-circle',
                    })
                    ->sortable(),
                TextColumn::make('grand_total')
                    ->numeric()
                    ->sortable()
                    ->money('NPR'),
                TextColumn::make('payment_method')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('payment_status')
                    ->searchable()
                    ->sortable()
                    ->badge(),
                // TextColumn::make('currency')
                //     ->searchable()
                //     ->sortable(),
                // TextColumn::make('shipping_amount')
                //     ->numeric()
                //     ->sortable(),
                TextColumn::make('shipping_method')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                Action::make('View Order')
                ->url(fn (Order $record): string => OrderResource::getUrl('view' , ['record' => $record]))
                ->color('info')
                ->icon('heroicon-o-eye'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
