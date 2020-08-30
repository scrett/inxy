<?php
//Клас оработчик обращений к сущности Products
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //Функция отображения списка товаров
    public function allDataView(){
        return view('product-data-view',['data' => Product::paginate(10)]);
    }
    //Функция отображения списка товаров с возможностью редактирования
    public function allData(){
        return view('product-data-all',['data' => Product::paginate(10)]);
    }
    //Функция отображения формы добавления товара
    public function add(){
        return view('product-add');
    }
    //Функция отображения формы подробного описания товара
    public function showOneData($id){
        $product = New Product;
        return view('product-one',['data' => $product->find($id)]);
    }
    //Функция обработчик формы добавления товара
    public function addSubmit(ProductRequest $req){
        $product = New Product;
        $product->provider= $req->input('provider');
        $product->brand= $req->input('brand');
        $product->location= $req->input('location');
        $product->cpu= $req->input('cpu');
        $product->drive= $req->input('drive');
        $product->price= $req->input('price');
        $product->save();
        return redirect()->route('product-data-all')->with('success','The product  has been added!');
    }
    //Функция обработчик кнопки удаления товара
    public function delete($id){
        Product::find($id)->delete();
        return redirect()->route('product-data-all')->with('success','The product has been removed!');
    }
    //Функция обработчик формы редактирования товара
    public function updata($id){
        $product = New Product;
        return view('product-updata',['data' => $product->find($id)]);
    }
    //Функция отображения формы редактирования товара
    public function updataSubmit($id,ProductRequest $req){
        $product = Product::find($id);
        $product->provider= $req->input('provider');
        $product->brand= $req->input('brand');
        $product->location= $req->input('location');
        $product->cpu= $req->input('cpu');
        $product->drive= $req->input('drive');
        $product->price= $req->input('price');
        $product->save();
        return redirect()->route('product-data-one',$id)->with('success','The product has been updated!');
    }
    //Функция импорта файла json в БД
    public function load(Request $req){
        //Проверяем был ли выбран товар
        if ($req->file('upload')!='') {

            $path = $req->file('upload');
            $json = join(file($path));
            $objs = json_decode($json);

            foreach ($objs as $key => $obj1) {
                //ищем начало данных про товары
                if ($key == 'data') {

                    foreach ($obj1 as $obj) {
                        //Обновляем или добавляем определенный товар
                        DB::table('products')->updateOrInsert(
                            ['provider' => $obj->{'provider'}],
                            ['brand' => $obj->{'brand'},
                                'location' => $obj->{'location'},
                                'cpu' => $obj->{'cpu'},
                                'drive' => $obj->{'drive'},
                                'price' => $obj->{'price'}]
                        );
                    }
                    //удаляем товары которых нет в json
                    DB::table('products')->whereNotIn('provider', array_column($obj1,'provider'))->delete();

                }
            }
            return redirect()->route('product-data-all')->with('success', 'Products table has been updated!');
        }
        else
            return redirect()->route('product-data-all');
    }

}
