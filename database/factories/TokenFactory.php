<?php

namespace Nzokolab\MtnMomo\Database\Factories;

use Nzokolab\MtnMomo\Models\Token;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TokenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Token::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Générer un access token sécurisé
        $accessToken = Str::random(60);
        
        // Générer un refresh token sécurisé
        $refreshToken = Str::random(60);
        
        // Choisir un type de token au hasard parmi les options disponibles
        $tokenType = $this->faker->randomElement(['Basic', 'Bearer']);
        
        // Choisir un produit au hasard parmi les options disponibles
        $product = $this->faker->randomElement(['collection', 'disbursement', 'remittance']);
        
        // Générer une date d'expiration pour le token
        $expiresAt = $this->faker->dateTime('now', null);
        
        // Retourner les données du token
        return [
            'access_token' => $accessToken,
            'refresh_token' => $refreshToken,
            'token_type' => $tokenType,
            'product' => $product,
            'expires_at' => $expiresAt,
        ];
    }
}
