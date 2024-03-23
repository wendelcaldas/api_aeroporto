<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cidades = [
            ['cidade' => 'São Paulo', 'uf' => 'SP'],
            ['cidade' => 'Rio de Janeiro', 'uf' => 'RJ'],
            ['cidade' => 'Belo Horizonte', 'uf' => 'MG'],
            ['cidade' => 'Salvador', 'uf' => 'BA'],
            ['cidade' => 'Curitiba', 'uf' => 'PR'],
            ['cidade' => 'Brasília', 'uf' => 'DF'],
            ['cidade' => 'Recife', 'uf' => 'PE'],
            ['cidade' => 'Porto Alegre', 'uf' => 'RS'],
            ['cidade' => 'Manaus', 'uf' => 'AM'],
            ['cidade' => 'Aracaju', 'uf' => 'SE'],
            // adicionar mais cidades conforme modelo acima pô
        ];

        foreach ($cidades as $cidade) {
            Cidade::create($cidade);
        }
    }
}
