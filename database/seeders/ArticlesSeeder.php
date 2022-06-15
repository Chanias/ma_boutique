<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'nom' => 'Sweat Floral',
            'description_courte' => 'Sweat Avec Imprimé Floral ',
            'description_longue' => 'Couleur : gris, Motif : Uni, Matière extérieure : 60% Coton, 40% Polyester, Coupe de l article : Regular / Coupe standard, Instruction entretien : Lavage en machine, Catégorie de produit : Sweat-shirt ',
            'image' => 'sweat_floral.jpg',
            'prix' => '50,90',
            'stock' => '50',
            'note' => '4',
            'gamme_id'=>1
        ]);

        Article::create([
            'nom' => 'Sweat Metallica',
            'description_courte' => '... And Justice For All ',
            'description_longue' => 'Couleur : noir, Motif : uni, Matière extérieur : 80% Coton, 20% Polyester , Coupe de l article : Regular / Coupe standard, Instruction entretien : Lavage en machine, Catégorie de produit : Sweat-shirt à capuche',
            'image' => 'sweat_metallica.jpg',
            'prix' => '49,99',
            'stock' => '150',
            'note' => '4',
            'gamme_id'=>1
        ]);

        Article::create([
            'nom' => 'Sweat Rammstein',
            'description_courte' => '',
            'description_longue' => 'Couleur : noir, Motif : uni, Matière extérieur : 65% Coton, 35% Polyester , Coupe de l article : Regular / Coupe standard, Instruction entretien : Lavage en machine, Catégorie de produit : Sweat à capuche',
            'image' => 'sweat_rammstein.jpg',
            'prix' => '49,99',
            'stock' => '150',
            'note' => '3',
            'gamme_id'=>1
        ]);

        Article::create([
            'nom' => 'Sweat/Veste Jean',
            'description_courte' => 'Veste À Capuche En Jean Cradock ',
            'description_longue' => 'Couleur : noir, Motif : uni, Matière extérieur : 75% Coton, 23% Polyester, 2% Élasthanne, Coupe de l article : Regular / Coupe standard, Instruction entretien : Lavage en machine, Catégorie de produit : Sweat-shirt zippé à capuche',
            'image' => 'sweat_veste.jpg',
            'prix' => '80',
            'stock' => '60',
            'note' => '5',
            'gamme_id'=>1
        ]);

        Article::create([
            'nom' => 'Sweat YAKUZA',
            'description_courte' => 'YAKUZA-ONNA ',
            'description_longue' => 'Couleur : noir, Motif : Uni, Matière extérieure : 80 % coton (organique), 20 % polyester (recyclé) , Coupe de l article : Regular / Coupe standard, Instruction entretien : Lavage en machine, Catégorie de produit : Sweat-shirt à capuche  ',
            'image' => 'sweat_yakuza.jpg',
            'prix' => '40',
            'stock' => '20',
            'note' => '5',
            'gamme_id'=>1
        ]);

        Article::create([
            'nom' => 'Pantalon Bicolore',
            'description_courte' => 'Skarlett',
            'description_longue' => 'Couleur : noir/lilas, Coupe du pantalon : Slim Fit, Forme du pantalon : Coupe moulante, Type de fermeture : Fermeture zippé, Motif : Carreaux, Uni, Matière extérieure : 97 % coton , 3% spandex, Instruction entretien : Lavage en machine, Catégorie de produit : pantalon slim double couleur  ',
            'image' => 'pantalon_bicolore.jpg',
            'prix' => '25,99',
            'stock' => '50',
            'note' => '3',
            'gamme_id'=>2
        ]);

        Article::create([
            'nom' => 'Pantalon évasé',
            'description_courte' => 'Grace - Jean Bleu Foncé ',
            'description_longue' => 'Couleur : bleu, Coupe du pantalon : Bootcut, Motif : Uni, Matière extérieure : 98 % coton , 2% élastanne, Instruction entretien : Lavage en machine, Catégorie de produit : pantalon bootcut  ',
            'image' => 'pantalon_evase.jpg',
            'prix' => '35',
            'stock' => '150',
            'note' => '5',
            'gamme_id'=>2
        ]);

        Article::create([
            'nom' => 'Pantalon Jeans',
            'description_courte' => 'Skarlett - Jeans mit starker',
            'description_longue' => 'Couleur : noir, Coupe du pantalon : Slim Fit, Motif : Uni, Matière extérieure : 70 % coton , 28% polyester, 2% élastanne, Instruction entretien : Lavage en machine, Catégorie de produit : pantalon jeans  ',
            'image' => 'pantalon_evase.jpg',
            'prix' => '46,99',
            'stock' => '100',
            'note' => '4',
            'gamme_id'=>2
        ]);

        Article::create([
            'nom' => 'Pantalon en toile',
            'description_courte' => 'Megan',
            'description_longue' => 'Couleur : rouge/noir, Coupe du pantalon : Skinny, Forme du pantalon : Coupe très moulante, Hauteur taille pantalon : Taille basse, Type de fermeture : Fermeture zippé sous patte, Effets/Particularités : Bouton marqué et patch de la marque, Motif : Batik, Matière extérieure : 98 % coton , 2% élastanne , Garniture : 100% Polyuréthane, Instruction entretien : Lavage en machine, Catégorie de produit : pantalon en toile  ',
            'image' => 'pantalon_rouge.jpg',
            'prix' => '52,99',
            'stock' => '130',
            'note' => '3',
            'gamme_id'=>2
        ]);

        Article::create([
            'nom' => 'Pantalon Taille Haute',
            'description_courte' => 'Jean Taille Haute ',
            'description_longue' => 'Couleur : noir, Coupe du pantalon : Slim Fit, Forme du pantalon : Coupe moulante, Hauteur taille pantalon : Taille haute, Type de fermeture : Fermeture zippé sous patte,  Motif : Batik, Matière extérieure : 72 % coton , 3% élastanne, 25% polyester, Instruction entretien : Lavage en machine, Catégorie de produit : pantalon jeans ',
            'image' => 'pantalon_taille_haute.jpg',
            'prix' => '52,99',
            'stock' => '150',
            'note' => '4',
            'gamme_id'=>2
        ]);
        Article::create([
            'nom' => 'T shirt Chauve souris',
            'description_courte' => 'Haut Dos Dentelle Manches Chauve-Souris  ',
            'description_longue' => 'Couleur : noir, Motif : Uni, Matière extérieure : 95 % viscose , 5 % élastanne, Autre matière : Dentelle : 95% polyamide, 5% élasthanne , Coupe de l article : Large, Instruction entretien : Lavage à la main, Catégorie de produit : t shirt manches courtes ',
            'image' => 't_shirt_chauve_souris.jpg',
            'prix' => '36,99',
            'stock' => '150',
            'note' => '5',
            'gamme_id'=>3
        ]);
        Article::create([
            'nom' => 'T shirt col V',
            'description_courte' => 'T-Shirt Noir Col V & Imprimé  ',
            'description_longue' => 'Couleur : noir, Motif : Uni, Matière extérieure : 95 % viscose , 5% élastanne, Coupe de l article : Regular / Coupe standard, Instruction entretien : Lavage en machine, Catégorie de produit : T-Shirt Manches courtes  ',
            'image' => 't_shirt_col_V.jpg',
            'prix' => '27,99',
            'stock' => '150',
            'note' => '4',
            'gamme_id'=>3
        ]);
        Article::create([
            'nom' => 'T-Shirt Manches courtes',
            'description_courte' => ' Be Different! ',
            'description_longue' => 'Couleur : noir, Motif : Uni, Matière extérieure : 100 % coton , Coupe de l article : Large, Instruction entretien : Lavage en machine, Catégorie de produit : T-Shirt Manches courtes  ',
            'image' => 't_shirt_manches_courtes.jpg',
            'prix' => '21,99',
            'stock' => '150',
            'note' => '4',
            'gamme_id'=>3
        ]);
        Article::create([
            'nom' => 'T-Shirt Manches courtes ',
            'description_courte' => 'Diamant  ',
            'description_longue' => 'Couleur : gris foncé, Effet matière : Vintage, Effets/particularités : Vintage, Avec découpes, Strass, Manches Raglan, Motif : Uni, Symboles, Matière extérieure : 72 % coton , 3% élastanne, 25% polyester, Instruction entretien : Lavage en machine, Catégorie de produit : pantalon jeans ',
            'image' => 't_shirt_rammstein.jpg',
            'prix' => '32,99',
            'stock' => '150',
            'note' => '4',
            'gamme_id'=>3
        ]);
        Article::create([
            'nom' => 'T-Shirt Rockabilly',
            'description_courte' => 'T-Shirt Look Rockabilly Noir/Rouge  ',
            'description_longue' => 'Couleur : noir/bordeaux, Motif : Uni, Matière extérieure : 95 % coton , 5% élastanne, Coupe de l article : Regular / Coupe standard, Instruction entretien : Lavage en machine, Catégorie de produit : T-Shirt Manches courtes ',
            'image' => 't_shirt_rockabily.jpg',
            'prix' => '32,99',
            'stock' => '150',
            'note' => '4',
            'gamme_id'=>3
        ]);
        Article::create([
            'nom' => 'Robe longue Celtic',
            'description_courte' => 'Long Dress with Celtic Adornment  ',
            'description_longue' => 'Couleur : noir, Effets/particlarités : Fente d aisance, Petite ouverture dans le dos , Type de fermeture : Ceinture à lacer,  Motif : Uni, Matière extérieure : 95% Viscose, 5% Élasthanne , Instruction entretien : Lavage en machine, Catégorie de produit : robe longue',
            'image' => 'robe_celtic.jpg',
            'prix' => '55,99',
            'stock' => '150',
            'note' => '5',
            'gamme_id'=>4
        ]);
        Article::create([
            'nom' => 'Robe courte',
            'description_courte' => 'Stay A Little Longer ',
            'description_longue' => 'Couleur : noir,Effets/particularités : Patch(s), Partie lacée, Coutures décoratives, Motif : Uni, Matière extérieure : 95% Coton, 5% Élasthanne , Instruction entretien : Lavage en machine, Catégorie de produit : robe courte ',
            'image' => 'robe_courte.jpg',
            'prix' => '41,99',
            'stock' => '150',
            'note' => '4',
            'gamme_id'=>4
        ]);
        Article::create([
            'nom' => 'Robe mi-longue',
            'description_courte' => 'Ancient Roses  ',
            'description_longue' => 'Couleur : multicolore, Motif : Floral, Multicolore , Matière extérieure : 97% Coton, 3% Spandex , Instruction entretien : Lavage en machine, Catégorie de produit : Robe mi-longue ',
            'image' => 'robe_mi_longue.jpg',
            'prix' => '74,99',
            'stock' => '150',
            'note' => '5',
            'gamme_id'=>4
        ]);
        Article::create([
            'nom' => 'Robe courte Rockabily',
            'description_courte' => ' Rockabilly-Look Dress ',
            'description_longue' => 'Couleur : noir, Motif : Uni, Matière extérieure : 95 % coton , 5% élastanne, 25% polyester, Instruction entretien : Lavage en machine, Catégorie de produit : Robe courte',
            'image' => 'robe_rockabily.jpg',
            'prix' => '20,99',
            'stock' => '150',
            'note' => '4',
            'gamme_id'=>4
        ]);
        Article::create([
            'nom' => 'Robe Salopette mi-longue',
            'description_courte' => 'Robe Salopette Dakota  ',
            'description_longue' => 'Couleur : noir, Motif : Uni, Matière extérieure : 98 % coton , 2% élastanne, Instruction entretien : Lavage en machine, Catégorie de produit : Robe mi-longue ',
            'image' => 'robe_salopette.jpg',
            'prix' => '46,99',
            'stock' => '150',
            'note' => '4',
            'gamme_id'=>4
        ]);
        Article::create([
            'nom' => 'Badge',
            'description_courte' => 'Black Crow  ',
            'description_longue' => 'Couleur : noir, Matière extérieure : métal, Catégorie de produit : Accessoire->Badge ',
            'image' => 'badge.jpg',
            'prix' => '1,99',
            'stock' => '150',
            'note' => '4',
            'gamme_id'=>5
        ]);
        Article::create([
            'nom' => 'Casquette',
            'description_courte' => 'Rammstein - Flexfit Cap ',
            'description_longue' => 'Couleur : noir, Matière extérieure : 63% Polyester, 34% Coton, 3% Élasthanne , Catégorie de produit : Accessoire->Casquette ',
            'image' => 'casquette.jpg',
            'prix' => '28,99',
            'stock' => '150',
            'note' => '4',
            'gamme_id'=>5
        ]);
        Article::create([
            'nom' => 'Pendentif',
            'description_courte' => 'L Arbre de Vie ',
            'description_longue' => 'Couleur : argent, Matière extérieure : Rhodium , Catégorie de produit : Accessoiore/Pendentif ',
            'image' => 'pendentif.jpg',
            'prix' => '75,99',
            'stock' => '150',
            'note' => '4',
            'gamme_id'=>5
        ]);
        Article::create([
            'nom' => 'Mini Sac À Dos ',
            'description_courte' => 'Loungefly - My Melody & Kuromi Double Pocket ',
            'description_longue' => 'Couleur : noir/rose, Matière extérieure : Polyuréthane, Catégorie de produit : Accessoire/Sac à dos',
            'image' => 'sac_a_dos.jpg',
            'prix' => '95,99',
            'stock' => '150',
            'note' => '4',
            'gamme_id'=>5
        ]);
        Article::create([
            'nom' => 'Pochette de ceinture ',
            'description_courte' => ' Sac Side Kick',
            'description_longue' => 'Couleur : noir, Matière extérieure : 100% Polyester , Catégorie de produit : Accessoire/pochette de ceinture ',
            'image' => 'sac.jpg',
            'prix' => '23,99',
            'stock' => '150',
            'note' => '4',
            'gamme_id'=>5
        ]);
    }
}
