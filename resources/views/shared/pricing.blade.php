@php
    $type = $type ?? null;
    $description = $description ?? null;
    $surface = $surface ?? null;
    $duree = $duree ?? null;
    $value = $value ?? null;
@endphp

<!-- column price -->
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="table_price full">
       <div class="inner_table_price">
          <div class="price_table_head blue_bg">
             <h2>{{$type}}</h2>
          </div>
          <div class="price_table_inner">
             <div class="cont_table_price_blog">
                <p class="blue1_color">durer construction : <span class="price_no">{{$duree}}</span> Jour</p>
             </div>
             <div class="cont_table_price">
                <ul>
                   <li>{{$description}}</li>
                   <li>{{$surface}}</li>
                </ul>
             </div>
          </div>
          <div class="price_table_bottom">
             <div class="center">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type_maison" value="{{$value}}">
                    <label class="form-check-label">
                      Select Type Maison
                    </label>
                  </div>
             </div>
          </div>
       </div>
    </div>
 </div>


