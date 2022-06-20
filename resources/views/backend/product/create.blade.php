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
                                    <h2 class="mt-0 mb-3">{{ (isset($product))?'Editando':'Creando' }} Producto <i class="fa fa-pills" style="color:#2980B9"></i></h2>
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
                                                    <label>Stock Inicial</label>
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
                                                @if(isset($product))
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="card-header" style="background-color:#2980B9"> <h5 class="card-title" style="color:white">Alternativos <button  v-on:click="openModalSetType('openAlternativos')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalProductoAsociado">+</button></h5> </div>
                                                            <div class="card-body" style="max-height: 200px; overflow-y: auto;">

                                                                <div v-if="!similarProducts" class="alert alert-warning" role="alert">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <strong>Sin Alternativos!</strong> agregados a este producto.
                                                                </div>
                                                                <div v-else>
                                                                    <div v-for="similar in similarProducts" class="alert alert-success" role="alert">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        <strong>#CODE0024 - @{{similar.name}}</strong>
                                                                    </div>
                                                                </div>
                                                                <!-- begin alert div -->    
                                                            </div>
                                                        </div>    
                                                    </div>
                                                
                                                    <div class="col-lg-6"> 
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="card-header" style="background-color:#2980B9"> <h5 class="card-title" style="color:white">Bio-equivalentes <a  v-on:click="openModalSetType('openBioequivalentes')" href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalProductoAsociado"> +</a></h5></div>
                                                            <div class="card-body" style="max-height: 200px; overflow-y: auto;">
                            
                                                                <div v-if="bioequivalentes.length == 0" class="alert alert-warning" role="alert">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <strong>Sin Bio-equivalentes!</strong> agregados a este producto.
                                                                </div> 
                                                                <div v-else>
                                                                    <div v-for="bioequivalente in bioequivalentes" class="alert alert-success" role="alert">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        <strong>#CODE0024 - @{{bioequivalente.name}}</strong>
                                                                    </div>
                                                                </div>
                                                                <!-- begin alert div -->
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>IVA (%)</label>
                                                    <input type="number" name="tax" class="form-control" 
                                                            @if (isset($product->tax)) 
                                                                value="{{$product->tax}}" 
                                                            @else 
                                                                value="21"
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
                                            @if(isset($product))                                        
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="card-header" style="background-color:#2980B9"> <h5 class="card-title" style="color:white">Principios activos <a v-on:click="openModalSetType('openPrincipiosActivos')" href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalProductoAsociado">+</a></h5></div>
                                                            <div class="card-body">
                                                                <div class="alert alert-warning" role="alert">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <strong>Sin Princios activos!</strong> agregados a este producto.
                                                                </div>
                                                                <!-- begin alert div -->
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>   
                                            @endif
                                                
                                            </div>
                                        </div>
                                        <input type="hidden" name="status" value="1">
                                        <button type="submit" class="btn btn-primary"><b> {{ (isset($product))?'ACTUALIZAR':'CREAR' }} </b></button>
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
                                            <i v-if="openAlternativos"> Alternativos</i>
                                            <i v-if="openPrincipiosActivos"> Principios activos</i>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div v-if="openBioequivalentes||openAlternativos">
                                            <input type="text" class="form-control" placeholder="Buscar producto por nombre o codigo (minimo 4 letras)" v-model="queryParamsProducts" v-on:keyup="getQueryParams">
                                            <table class="table" style="	overflow-y: scroll;">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Barcode</th>
                                                    <th>Nombre</th>
                                                    <th>Principios Activos</th>
                                                    <th></th>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(product, index) in products">
                                                        <td>@{{ index + 1 }}</td>
                                                        <td></td>
                                                        <td>@{{ product.name }}</td>
                                                        <td></td>
                                                        <td>
                                                            <button v-on:click="addProductRelation(product)" class="btn btn-primary">+</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                                <div class="alert alert-warning" role="alert" v-if="!products.length">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <strong>Sin coincidencias!</strong>
                                                </div>
                                                <i  v-if="searchingProducts" class="fa fa-spinner fa-spin" style="text-align:center;display: inline-block;width: 100%;" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary">Guardar </button>
                                    </div>
                                </div>    
                            </div>
                        </div>
                
                        </div>
                        <!-- end row -->
                        
                </div>
            </div>
<style>
    .form-control:hover{
        border-color: #2980b9;
    }
    .form-control:focus{
        border-color: #2980b9;
        border-width: 2px;
        box-shadow: 120px 80px 40px 20px #0ff;
    }
</style>


        @endsection
    
        @section('scripts')
                <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/axios@0.24.0/dist/axios.min.js"></script>
                <script>
                    $(document).ready(function(){
                        //$('#modalProductoAsociado').modal({backdrop: 'static', keyboard: false})
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
                        errorsInQueryProducts: [],
                        selected: [],
                        openBioequivalentes: false,
                        openAlternativos: false,
                        openPrincipiosActivos:false,
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
                        similarProducts : null,
                        bioequivalentes: [],
                        queryParamsProducts: '',
                        searchingProducts: false,
                    },
                    mounted() {
                       // alert('hola');
                        //this.getCategories();
                        //this.getBrands();
                        //this.getProducts();
                        @if(isset($product))
                            product = {!! $product !!};
                            this.getSimilarProducts(product);
                            this.getBioequivalentes(product);
                        @endif
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
                            this.products = [];
                            this.searchingProducts = false;
                            this.queryParamsProducts = '';   
                            if(type == 'openBioequivalentes'){

                                this.openBioequivalentes = true;
                                this.openAlternativos = false;
                                this.openPrincipiosActivos = false;
                            }
                            else if(type == 'openAlternativos'){

                                this.openAlternativos = true;
                                this.openBioequivalentes = false;
                                this.openPrincipiosActivos = false;
                            }
                            else if(type == 'openPrincipiosActivos'){

                                this.openPrincipiosActivos = true;
                                this.openBioequivalentes = false;
                                this.openAlternativos = false;
                            }
                        },
                        getQueryParams(){
                            //this.queryParamsProducts = queryParams;
                            this.products = [];
                            //console.log("getQueryParams");
                            if(this.queryParamsProducts.length > 3){
                                this.searchingProducts = true;
                                this.queryProducts(this.queryParamsProducts);
                            }else{
                                this.searchingProducts = false;
                            }
                            
                        },
                        addProductRelation(product){
                            this.errors = [];
                            relation_type = '';
                            if(this.openBioequivalentes && !this.openAlternativos)
                                relation_type = 'bioequivalentes';
                            else if(!openBioequivalentes && openAlternativos)
                                relation_type = 'alternativos';
                            
                            axios.post('{{URL::to('add/product/relation')}}', {
                                product_id: this.product.id,
                                relation_id: product.id,
                                relation_type: relation_type
                            }).then(response => {
                                if (response.data.errors) {
                                    this.errors = response.data.errors;
                                }
                                if (response.data.success) {
                                    //this.getProducts();
                                   // this.product = {};
                                    this.getBioequivalentes(this.product);
                                    this.getSimilarProducts(this.product);
                                }
                            }).catch(error => {
                                console.log(error);
                            });
                        },
                        async getSimilarProducts(product) {
                            this.errors = [];
                            this.product = product;
                            await axios.post('{{URL::to('fetch/similar/products')}}', {
                                product_id: this.product.id,
                            }).then(response => {
                                if (response.data.errors) {
                                    this.errors = response.data.errors;
                                }
                                if (response.data.success) {
                                    this.similarProducts = response.data.data;
                                    //console.log("Name:" + this.similarProducts);
                                }
                                /*this.similarProducts = response.data;
                                console.log("33" + this.similarProducts[0].id);+/*/

                                
                            }).catch(error => {
                                console.log(error);
                            });
                        },
                        async getBioequivalentes(product) {
                            this.errors = [];
                            this.product = product;
                            await axios.post('{{URL::to('fetch/bioequivalentes')}}', {
                                product_id: this.product.id,
                            }).then(response => {
                                if (response.data.errors) {
                                    this.errors = response.data.errors;
                                }
                                if (response.data.success) {
                                    this.bioequivalentes = response.data.data;
                                    console.log("Name:" + this.bioequivalentes);
                                }
                                
                            }).catch(error => {
                                console.log(error);
                            });
                        },
                        async queryProducts(query) {
                            this.errors = [];
                            await axios.post('{{URL::to('query/products')}}', {
                                query: query,
                            }).then(response => {
                                if (response.data.errors) {
                                    this.errors = response.data.errors;
                                }
                                if (response.data.success) {
                                    this.products = response.data.products;
                                    console.log( response.data.products);
                                }
                                /*this.similarProducts = response.data;
                                console.log("33" + this.similarProducts[0].id);+/*/
                                
                            }).catch(error => {
                                console.log(error);
                            }).finally(() => {
                                this.searchingProducts = false;
                            });
                        },
                    },
                });


                
                
                </script>
            @endsection