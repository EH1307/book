<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // création des genres
        App\Genre::create([
            'name' => 'science'
        ]);
        App\Genre::create([
            'name' => 'maths'
        ]);
        App\Genre::create([
            'name' => 'cookbook'
        ]);

        // on prendra garde de bien supprimer toutes les images avant de commencer les seeders
        Storage::disk('local')->delete(Storage::allfiles());

        //création de 30 livres à partir de la factory
        factory(App\Book::class, 30)->create()->each(function($book){
            //associons un genre à un livre que nous venons de créer
            $genre = App\Genre::find(rand(1,3));

            //pour chaque $book on lui associe un genre en pariculier
            $book->genre()->associate($genre);
            $book->save(); // il faut sauvegarder l'association pour faire persister en base de données
        });

        //ajout des images
        $link = str::random(12) . '.jpg';
        $file = file_get_contents('http://lorempicsum.com/futurama/250/250/' .rand(1, 9));
        Storage::disk('local')->put($link, $file);

        $book->picture()->create([
            'title' => 'Default', // valeur par défaut
            'link' => $link
        ]);
        // récupération des id des auteurs à partir de la méthode pluck d'Eloquent
        //les méthodes du pluck shuffle et slice permettent de mélanger et récupérer un certain
        // nombre 3 à partir de l'indice 0, comme ils sont mélangés à chaque fois qu'un livre est crée
        // on aura des id à chaque fois aléatoires.
        // La méthode all permet de faire la requête et de récupérer le resultat sous forme d'un tableau
        $authors =App\Author::pluck('id')->shuffle()->slice(0, rand(1,3))->all();
        
        // Il faut se mettre maintenant en relation avec les auteurs ( relation ManyToMany) et attacher les id des auteurs
        // dans la table de liaison.
        $book->authors()->attach($authors);

    
    }
}
