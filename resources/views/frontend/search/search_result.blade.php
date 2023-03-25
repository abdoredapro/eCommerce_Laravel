
<style>
    body {
    background-color: #eee
}

.card {
    background-color: #fff;
    padding: 15px;
    border: none
}

.input-box {
    position: relative
}

.input-box i {
    position: absolute;
    right: 13px;
    top: 15px;
    color: #ced4da
}

.form-control {
    height: 50px;
    background-color: #eeeeee69
}

.form-control:focus {
    background-color: #eeeeee69;
    box-shadow: none;
    border-color: #eee
}

.list {
    padding-top: 20px;
    padding-bottom: 10px;
    display: flex;
    align-items: center
}

.border-bottom {
    border-bottom: 2px solid #eee
}

.list i {
    font-size: 19px;
    color: red
}

.list small {
    color: #dedddd
}
</style>

<div class="container mt-5">
    <div class="row d-flex justify-content-center ">
        <div class="col-md-6">
            <div class="card">
            

                @foreach ($productInfo as $item)
                    
                
                <a href="{{route('product.detail',['id'=>$item->id,'slug'=>$item->product_slug_en])}}">
                    <div class="list border-bottom "> <img src="{{ asset('/upload/product/'.$item->product_thambnail) }}" style="width: 25px; margin-right:5px">
                        <div class="d-flex flex-column ml-3"> <span>{{ $item->product_name_en }}</span> </div>
                    </div>
                </a>

                @endforeach
 
            </div>
        </div>
    </div>
</div>

