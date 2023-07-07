<?php 
namespace App\Exports;
use App\User;
use DB;
use App\Models\Usuarios;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\AfterSheet;

class Userexports implements FromCollection, WithHeadings, WithEvents, WithColumnWidths
{
    use RegistersEventListeners;
    
    public function collection()
    {
        // Retorna los datos que deseas exportar
        $users = DB::table('papeletas')->select('id','num_papeleta', 'dni','dependencia','motivo','lugar','hora_salida', 'hora_llegada','observacion', 'fecha_ini', 'fecha_fin')->get();
        return $users;
    }

    public function headings(): array
    {
        // Define los encabezados de las columnas
        return [
            '#',
            'Numero de papeleta',
            'Dni',
            'Dependencia',
            'Motivo',
            'Lugar',
            'Hora salida',
            'Hora llegada',
            'Observacion',
            'Fecha inicio',
            'Fecha final',
        ];
    }

    //public function startCell(): string
    //{
        // Define la celda de inicio para los datos
      //  return 'A8';
    //}

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Configura el área de impresión para incluir el encabezado en cada página
                $sheet->getPageSetup()
                    ->setRowsToRepeatAtTopByStartAndEnd(1, 1)
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT)->setPaperSize(PageSetup::PAPERSIZE_A4);

                // Ajusta el margen superior para dar espacio al encabezado
                $sheet->getPageMargins()
                    ->setTop(1);
            },

            //funcion para establecer background color a las celdas en excel
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:K1'; // El rango de celdas que deseas aplicar el estilo
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('cecece'); // Establece el color de fondo en gris
            },

        ];

    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 20,        
            'C' => 10,
            'D' => 15,
            'E' => 15,
            'F' => 25,
            'G' => 15,
            'H' => 15,
            'I' => 15,
            'J' => 15,
            'K' => 15,
        ];
    }

    public static function beforeExport(BeforeExport $event)
    {
        $event->writer->getDelegate()->getActiveSheet()->getHeaderFooter()
            ->setOddFooter('&L&B' . $event->writer->getDelegate()->getProperties()->getTitle() . '&RPágina &P de &N');
    }
}