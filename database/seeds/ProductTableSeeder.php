<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->truncate();
        $product = new Product();
        $product->name = "Aceite Alcamporado 60ml";
        $product->category = "PAIN, Fever";
        $product->price = 28.00;
        $product->description = "As counter-irritant for the relief of sprains, muscle and joint pains and mild respiratory tract disorder such as cold and bronchitis.";
        $product->dosage = "60ml";
        $product->save();
        
        $product = new Product();
        $product->name = "Aceite De Manzanilla (CHAMOMILE OIL) 30ml";
        $product->category = "GAS";
        $product->price = 14.00;
        $product->description = "to expel abdominal distension due to flatus";
        $product->dosage = "30ml";
        $product->save();

        $product = new Product();
        $product->name = "BCOM+BUCLIZINE+LYSINE+IRON (FERLETTE) Capsule";
        $product->category = "APPETITE STIMULANTS";
        $product->price = 12.50;
        $product->description = "";
        $product->dosage = "per cap";
        $product->save();

        $product = new Product();
        $product->name = "ACETAZOLAMIDE T250mg (CETAMID)";
        $product->category = "NAUSEA, VOMITING";
        $product->price = 26.00;
        $product->description = "";
        $product->dosage = "per tab";
        $product->save();

        $product = new Product();
        $product->name = "BENZALKONIUM CREAM 55G (DRAPOLENE) 1S";
        $product->category = "Antisepctic";
        $product->price = 26.00;
        $product->description = "";
        $product->dosage = "55G";
        $product->save();

        $product = new Product();
        $product->name = "BETADINE Wound Povidone Iodine 10percent antiseptic Sol. 15ml";
        $product->category = "ANTISEPTIC / DISINFECTANT";
        $product->price = 49.50;
        $product->description = "Meniere's disease, syndrome characterized by attacks of vertigo, sensorineural deafness, dizziness.";
        $product->dosage = "15ml";
        $product->save();

        $product = new Product();
        $product->name = "Aciclovir T400mg";
        $product->category = "HEMORRHOIDS";
        $product->price = 9.25;
        $product->description = "";
        $product->dosage = "per tab";
        $product->save();

        $product = new Product();
        $product->name = "MANGOS+MALUNGGAY 500/25MG CAP";
        $product->category = "Food Suppliment";
        $product->price = 8.00;
        $product->description = "";
        $product->dosage = "per cap";
        $product->save();

        $product = new Product();
        $product->name = "Ofloxacin Tab 400mg";
        $product->category = "Bacterial Infections";
        $product->price = 4.00;
        $product->description = "FOR THE TREATMENT OF INFECTIONS (RESPIRATORY TRACT,KIDNEY,SKIN,SOFT TISSUE,UTI),URETHRAL AND CERVICAL GONORRHEA";
        $product->dosage = "per tab";
        $product->save();

        $product = new Product();
        $product->name = "YASMIN T3MG/30MCG 21TABLETS-1S";
        $product->category = "CONDOMS AND CONTRACEPTIVES";
        $product->price = 813.00;
        $product->description = "FOR THE TREATMENT OF INFECTIONS (RESPIRATORY TRACT,KIDNEY,SKIN,SOFT TISSUE,UTI),URETHRAL AND CERVICAL GONORRHEA";
        $product->dosage = "per tab";
        $product->save();
    }
}
