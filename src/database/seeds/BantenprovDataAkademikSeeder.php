<?php
use Illuminate\Database\Seeder;
/**
 * Usage :
 * [1] $ composer dump-autoload -o
 * [2] $ php artisan db:seed --class=BantenprovDataAkademikSeeder
 */
class BantenprovDataAkademikSeeder extends Seeder
{
    /* text color */
    protected $RED     ="\033[0;31m";
    protected $CYAN    ="\033[0;36m";
    protected $YELLOW  ="\033[1;33m";
    protected $ORANGE  ="\033[0;33m";
    protected $PUR     ="\033[0;35m";
    protected $GRN     ="\e[32m";
    protected $WHI     ="\e[37m";
    protected $NC      ="\033[0m";
    /* File name */
    /* location : /databse/seeds/file_name.csv */
    protected $fileName = "BantenprovDataAkademikSeeder.csv";
    /* text info : default (true) */
    protected $textInfo = true;
    /* model class */
    protected $model;
    /* __construct */
    public function __construct(){
        $this->model = new Bantenprov\DataAkademik\Models\Bantenprov\DataAkademik\DataAkademik;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertData();
    }
    /* function insert data */
    protected function insertData()
    {
        /* silahkan di rubah sesuai kebutuhan */
        foreach($this->readCSV() as $data){

        	$this->model->create([
            	'user_id'           => $data['user_id'],
                'nomor_un'          => $data['nomor_un'],
                'nomor_kk'          => $data['nomor_kk'],
                'nama_siswa'        => $data['nama_siswa'],
                'bahasa_indonesia'  => $data['bahasa_indonesia'],
                'bahasa_inggris'    => $data['bahasa_inggris'],
                'matematika'        => $data['matematika'],
                'ipa'               => $data['ipa'],

            ]);

                if($this->textInfo){
                    echo "============[DATA]============\n";
                    $this->orangeText('nama_siswa : ').$this->greenText($data['nama_siswa']);
                    echo"\n";
                    $this->orangeText('nomor_un : ').$this->greenText($data['nomor_un']);
                    echo"\n";
                    $this->orangeText('nomor_kk : ').$this->greenText($data['nomor_kk']);
                    echo"\n";
                    $this->orangeText('nama_siswa : ').$this->greenText($data['nama_siswa']);
                    echo"\n";
                    $this->orangeText('bahasa_indonesia : ').$this->greenText($data['bahasa_indonesia']);
                    echo"\n";
                    $this->orangeText('bahasa_inggris : ').$this->greenText($data['bahasa_inggris']);
                    echo"\n";
                    $this->orangeText('matematika : ').$this->greenText($data['matematika']);
                    echo"\n";
                    $this->orangeText('ipa : ').$this->greenText($data['ipa']);
                    echo"\n";

                    echo "============[DATA]============\n\n";
                }

        }



        $this->greenText('[ SEEDER DONE ]');
        echo"\n\n";
    }
    /* text color: orange */
    protected function orangeText($text)
    {
        printf($this->ORANGE.$text.$this->NC);
    }
    /* text color: green */
    protected function greenText($text)
    {
        printf($this->GRN.$text.$this->NC);
    }
    /* function read CSV file */
    protected function readCSV()
    {
        $file = fopen(database_path("seeds/".$this->fileName), "r");
        $all_data = array();
        $row = 1;
        while(($data = fgetcsv($file, 1000, ",")) !== FALSE){
            $all_data[] = [
                'user_id'           => $data[0],
                'nomor_un'          => $data[1],
                'nomor_kk'          => $data[2],
                'nama_siswa'        => $data[3],
                'bahasa_indonesia'  => $data[4],
                'bahasa_inggris'    => $data[5],
                'matematika'        => $data[6],
                'ipa'               => $data[7],
            ];
        }
        fclose($file);
        return  $all_data;
    }
}
