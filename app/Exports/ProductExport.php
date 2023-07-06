<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductExport implements FromCollection,WithHeadings,WithMapping,ShouldAutoSize
{

    public function collection()
    {
        return Product::all();
    }

    public function columnWidths(): array
    {
        return [
            'Tên sản phẩm' => 300,
        ];
    }

    public function headings(): array {
        return [
            'ID',
            'Tên sản phẩm',
            'Mô tả', 
            "Giá mới",
            "Giá cũ",
            "Giá tối thiểu",
            "Giá tối đa",
            "Mã sản phẩm",
            "Số lượng tồn kho",
        ];
    }

    public function map($product): array {
        return [
            $product->id,
            $product->name,
            $product->desc,
            $product->price_sale,
            $product->price_regular,
            $product->price_from,
            $product->price_to,
            $product->code,
            $product->inventory,
        ];
    }

   
}
