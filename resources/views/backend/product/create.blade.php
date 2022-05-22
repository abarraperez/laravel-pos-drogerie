@extends('backend.layout.app')
@section('content')            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <div class="content" id="app">
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h2 class="mt-0 mb-3">Creando Producto</h2>
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <strong>Success!</strong> <span>{{Session::get('success')}}</span>
                                        </div>
                                    @endif
                                    <form role="form" 
                                        action="@if(isset($product)) 
                                                    {{route('product.update',$product->id)}} 
                                                @else 
                                                    {{route('product.store')}} 
                                                @endif" 
                                        method="post" >
                                        @if (isset($product))
                                            @method('PUT')
                                        @endif

                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" class="form-control" name="name"  aria-describedby="emailHelp" placeholder="Enter Name" 
                                                        @if (isset($product->name)) 
                                                            value="{{$product->name}}" 
                                                        @else 
                                                            value="{{old('name')}}"
                                                        @endif
                                                    >
                                                    @error('name')
                                                        <span>
                                                            <strong class="text-danger">{{$message}}</strong>
                                                        </span>
                                                    @enderror()
                                                </div>
                                        
                                                <div class="form-group">
                                                    <label>Descripcion</label>
                                                    <textarea name="desc" id="input" class="form-control" rows="3">
                                                        @if (isset($product->description)) 
                                                            {{$product->description}}   
                                                        @else 
                                                            {{old('desc')}}
                                                        @endif
                                                    </textarea>
                                                    @error('desc')
                                                        <span>
                                                            <strong class="text-danger">{{$message}}</strong>
                                                        </span>
                                                    @enderror()
                                                </div>

                                                <div class="form-group">
                                                    <label>Precio</label>
                                                    <input type="number" name="price" class="form-control" 
                                                        @if (isset($product->price)) 
                                                            value="{{$product->price}}" 
                                                        @else 
                                                            value="{{old('price')}}"
                                                        @endif
                                                    >
                                                    @error('price')
                                                        <span>
                                                            <strong class="text-danger">{{$message}}</strong>
                                                        </span>
                                                    @enderror()
                                                </div>

                                                <div class="form-group">
                                                    <label>Stock Fisico</label>
                                                    <input type="number" name="quantity" class="form-control" 
                                                        @if (isset($product->quantity)) 
                                                            value="{{$product->quantity}}" 
                                                        @else 
                                                            value="{{old('quantity')}}"
                                                        @endif
                                                    >
                                                    @error('quantity')
                                                        <span>
                                                            <strong class="text-danger">{{$message}}</strong>
                                                        </span>
                                                    @enderror()
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="card-header"> <h5 class="card-title">Alternativos </h5></div>
                                                            <div class="card-body">
                                                                <div class="alert alert-warning" role="alert">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <strong>Sin Alternativos!</strong> agregados a este producto.
                                                                </div>
                                                                <button  v-on:click="openBioequivalentes=true" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalProductoAsociado">+ Agregar</button>
                                                                <!-- begin alert div -->    
                                                            </div>
                                                        </div>    
                                                    </div>
                                                
                                                    <div class="col-lg-6"> 
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="card-header"> <h5 class="card-title">Bio-equivalentes</h5></div>
                                                            <div class="card-body">
                                                                <div class="alert alert-warning" role="alert">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <strong>Sin Bio-Equivalentes!</strong> agregados a este producto.
                                                                </div> 
                                                                <a href="#" class="btn btn-primary">+ Agregar</a>
                                                                <!-- begin alert div -->
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>IVA (%)</label>
                                                    <input type="number" name="tax" class="form-control" 
                                                            @if (isset($product->tax)) 
                                                                value="{{$product->tax}}" 
                                                            @else 
                                                                value="{{old('tax')}}"
                                                            @endif
                                                    >
                                                    @error('tax')
                                                        <span>
                                                            <strong class="text-danger">{{$message}}</strong>
                                                        </span>
                                                    @enderror()
                                                </div>   

                                                <label for="">Categoria</label>
                                                <select name="category_id" id="category" class="form-control" required="required">
                                                    @if (isset($category))
                                                        @foreach ($category as $cc)
                                                            <option class="category_option" @if (isset($product) && $product->category_id == $cc->id) selected @endif value="{{$cc->id}}">{{$cc->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>  

                                                <label for="">Marca</label>
                                                <select name="brands" id="brands" class="form-control" required="required"></select>                                   

                                                <div class="form-group">
                                                    <label>Imagen</label>
                                                    <input type="file" name="image" class="form-control" >
                                                    @error('image')
                                                        <span>
                                                            <strong class="text-danger">{{$message}}</strong>
                                                        </span>
                                                    @enderror()    
                                                </div>

                                                <div class="form-group">
                                                    <label>BARCODE</label>
                                                    <input type="number" name="tax" class="form-control" 
                                                        @if (isset($product->tax)) 
                                                            value="{{$product->tax}}" 
                                                        @else 
                                                            value="{{old('tax')}}"
                                                        @endif
                                                    >
                                                    @error('tax')
                                                        <span>
                                                            <strong class="text-danger">{{$message}}</strong>
                                                        </span>
                                                    @enderror()
                                                </div> 
                                        
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="card-header"> <h5 class="card-title">Principios activos</h5></div>
                                                            <div class="card-body">
                                                                <div class="alert alert-warning" role="alert">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <strong>Sin Princios activos!</strong> agregados a este producto.
                                                                </div>
                                                                <a href="#" class="btn btn-primary">+ Agregar</a>
                                                                <!-- begin alert div -->
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>   
                                        
                                                
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">+ Agregar</button>
                                    </form>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="modal fade" id="modalProductoAsociado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Agregando
                                            <i v-if="openBioequivalentes"> Bioequivalentes </i>
                                            <i v-if="opneAlternativos"> Alternativos</i>
                                            <i v-if="opnePrincipiosActivos"> Principios activos</i>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>    
                            </div>
                        </div>
                
                        </div>
                        <!-- end row -->
                        
                </div>
            </div>
                    
        @endsection
    
              @section('scripts')
                <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/axios@0.24.0/dist/axios.min.js"></script>
                <script>
                      $(document).ready(function(){

                        var option  = $('#category option:selected').val();
                   
                        $.ajax({
                            url : '{{URL::to('fetch/category_brands')}}/'+ option,
                            method:'GET',
                            type:"ajax",
                            proccessData:false,
                            ContentType:false,
                            dataType:"json",
                            success:function(response)
                            {
                                if(response.length)
                                {
                                    var html = '';

                                    for($i=0;$i<response.length;$i++)
                                    {
                                        html += "<option value='"+response[$i].id+"'>"+ response[$i].name+ "</option>";
                                    }

                                    $('#brands').html(html);
                                }
                            }


                        });

                        // ajax code end here
                        $('#category').change(function(){
                            
                              var option  = $('#category option:selected').val();
                   
                        $.ajax({
                            url : '{{URL::to('fetch/category_brands')}}/'+ option,
                            method:'GET',
                            type:"ajax",
                            proccessData:false,
                            ContentType:false,
                            dataType:"json",
                            success:function(response)
                            {

                            $('#brands').html('');

                                if(response.length)
                                {
                                    var html = '';

                                    for($i=0;$i<response.length;$i++)
                                    {
                                        html += "<option value='"+response[$i].id+"'>"+ response[$i].name+ "</option>";
                                    }

                                    $('#brands').html(html);
                                }
                            }


                        });

                        // ajax code end here

                        });
                    });
                

                var app = new Vue({ 
                    el: '#app',
                    data: {
                        categories: [],
                        brands: [],
                        products: [],
                        product: {},
                        errors: [],
                        selected: [],
                        openBioequivalentes: false,
                        opneAlternativos: false,
                        opnePrincipiosActivos:false,
                        selected_brand: [],
                        selected_category: [],
                        selected_product: [],
                        selected_product_id: [],
                        selected_product_name: [],
                        selected_product_price: [],
                        selected_product_tax: [],
                        selected_product_image: [],
                        selected_product_status: [],
                        selected_product_category: [],
                        selected_product_brand: [],
                        selected_product_principio: [],
                        selected_product_cantidad: [],
                        selected_product_presentacion: [],
                        selected_product_laboratorio: [],
                        selected_product_concentracion: [],
                        selected_product_forma: [],
                        selected_product_dosis: [],
                        selected_product_indicaciones: [],
                        selected_product_precauciones: [],
                        selected_product_interacciones: [],
                        selected_product_advertencias: [],
                        selected_product_fecha_caducidad: [],
                        selected_product_fecha_ingreso: [],
                        selected_product_lote: [],
                        selected_product_lote_fabricante: [],
                        selected_product_lote_fecha_caducidad: [],
                        selected_product_lote_fecha_ingreso: [],
                        selected_product_lote_precio: [],
                        selected_product_lote_cantidad: [],
                        selected_product_lote_laboratorio: [],
                        selected_product_lote_presentacion: [],
                        selected_product_lote_concentracion: [],
                        selected_product_lote_forma: [],
                        selected_product_lote_dosis: [],
                        selected_product_lote_indicaciones: [],
                        selected_product_lote_precauciones: [],
                        selected_product_lote_interacciones: [],
                        selected_product_lote_advertencias: [],
                        selected_product_lote_fecha_caducidad: [],
                        selected_product_lote_fecha_ingreso: [],
                        selected_product_lote_lote: [],
                    },
                    mounted() {
                       // alert('hola');
                        //this.getCategories();
                        //this.getBrands();
                        //this.getProducts();
                    },
                    methods: {
                        getCategories() {
                            axios.get('{{URL::to('fetch/categories')}}')
                                .then(response => {
                                    this.categories = response.data;
                                })
                                .catch(error => {
                                    console.log(error);
                                });
                        },
                        getBrands() {
                            axios.get('{{URL::to('fetch/brands')}}')
                                .then(response => {
                                    this.brands = response.data;
                                })
                                .catch(error => {
                                    console.log(error);
                                });
                        },
                        getProducts() {
                            axios.get('{{URL::to('fetch/products')}}')
                                .then(response => {
                                    this.products = response.data;
                                })
                                .catch(error => {
                                    console.log(error);
                                });
                        },
                        addProduct() {
                            this.errors = [];
                            axios.post('{{URL::to('add/product')}}', {
                                name: this.product.name,
                                price: this.product.price,
                                tax: this.product.tax,
                                image: this.product.image,
                                status: this.product.status,
                                category_id: this.product.category_id,
                                brand_id: this.product.brand_id,
                                principio: this.product.principio,
                                cantidad: this.product.cantidad,
                                presentacion: this.product.presentacion,
                                laboratorio: this.product.laboratorio,
                                concentracion: this.product.concentracion,
                                forma: this.product.forma,
                                dosis: this.product.dosis,
                                indicaciones: this.product.indicaciones,
                                precauciones: this.product.precauciones,
                                interacciones: this.product
                            }).then(response => {
                                if (response.data.errors) {
                                    this.errors = response.data.errors;
                                }
                                if (response.data.success) {
                                    this.getProducts();
                                    this.product = {};
                                }
                            }).catch(error => {
                                console.log(error);
                            });
                        },
                        editProduct(product) {
                            this.errors = [];
                            this.product = product;
                        },
                        updateProduct() {
                            this.errors = [];
                            axios.post('{{URL::to('update/product')}}', {
                                id: this.product.id,
                                name: this.product.name,
                                price: this.product.price,
                                tax: this.product.tax,
                                image: this.product.image,
                                status: this.product.status,
                                category_id: this.product.category_id,
                                brand_id: this.product.brand_id,
                                principio: this.product.principio,
                                cantidad: this.product.cantidad,
                                presentacion: this.product.presentacion,
                                laboratorio: this.product.laboratorio,
                                concentracion: this.product.concentracion,
                                forma: this.product.forma,
                                dosis: this.product.dosis,
                                indicaciones: this.product.indicaciones,
                                precauciones: this.product.precauciones,
                                interacciones: this.product
                            }).then(response => {
                                if (response.data.errors) {
                                    this.errors = response.data.errors;
                                }
                                if (response.data.success) {
                                    this.getProducts();
                                    this.product = {};
                                }
                            }).catch(error => {
                                console.log(error);
                            });
                        },
                        deleteProduct(product) {
                            this.errors = [];
                            this.product = product;
                        },
                        destroyProduct() {
                            this.errors = [];
                            axios.post('{{URL::to('destroy/product')}}', {
                                id: this.product.id,
                            }).then(response => {
                                if (response.data.errors) {
                                    this.errors = response.data.errors;
                                }
                                if (response.data.success) {
                                    this.getProducts();
                                    this.product = {};
                                }
                            }).catch(error => {
                                console.log(error);
                            });
                        },
                        //method for user actions
                        openModalSetType(type){
                            if(type == 'openBioequivalentes')
                                this.openBioequivalentes = true;
                        }
                    },
                });


                
                
                </script>
              @endsection