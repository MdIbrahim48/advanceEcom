
@php
     $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
@endphp
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
            @foreach ($categories as $catitem)
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{ $catitem->category_icon }}" aria-hidden="true"></i>@if (session()->get('language') == 'bangla')
                    {{ $catitem->category_name_bn }}
                @else
                {{ $catitem->category_name_en }}
                @endif</a>
                 <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                            @php
                                $subcategories = App\Models\SubCategory::where('category_id',$catitem->id)->orderBy('subcategory_name_en','ASC')->get();
                            @endphp
                            @foreach ($subcategories as $subcat)

                            <div class="col-sm-12 col-md-3">
                                @if (session()->get('language') == 'bangla')
                                <a href=""><h2 class="title">{{ $subcat->subcategory_name_bn }}</h2></a>
                            @else
                                <a href=""><h2 class="title">{{ $subcat->subcategory_name_en }}</h2></a>
                            @endif
                                <ul class="links list-unstyled">
                                    @php
                                        $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcat->id)->orderBy('subsubcategory_name_en','ASC')->get();
                                    @endphp
                                     @foreach ($subsubcategories as $item)
                                     @if (session()->get('language') == 'bangla')
                                         <li><a href="#">{{ $item->subsubcategory_name_bn }}</a></li>
                                     @else
                                         <li><a href="#">{{ $item->subsubcategory_name_en }}</a></li>
                                     @endif
                                    @endforeach

                                </ul>
                            </div><!-- /.col -->

                            @endforeach
                        </div><!-- /.row -->
                    </li><!-- /.yamm-content -->
                </ul><!-- /.dropdown-menu -->
            </li><!-- /.menu-item -->
            @endforeach

        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->