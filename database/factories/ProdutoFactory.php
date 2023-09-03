<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Str; //precisamos importa-la pq usamos la no slug($nome)

class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nome = $this->faker->unique()->sentence();
        return [
            'nome' => $nome,
            'descricao' => $this->faker->paragraph(),
            'preco' => $this->faker->randomNumber(2),
            'slug' => str::slug($nome),
            'imagem' => $this->faker->imageUrl(400, 400),
            'id_user' => User::pluck('id')->random(), // info da tabela
            'id_categoria' => Categoria::pluck('id')->random(),


        ];
    }
}
