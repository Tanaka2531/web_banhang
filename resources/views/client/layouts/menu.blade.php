<?php
use App\Http\Controllers\Clients\IndexController;
?>
<section class="menu">
    <div class="wrap-content">
        <nav id="primary-nav">
            <ul class="d-flex justify-content-center align-items-center">
                @foreach (IndexController::loadLevel1Cate() as $category)
                    <li>
                        <a href="{{ route('categoriesList',['name_list'=>$category->name,'id_list'=>$category->id]) }}" title="{{ $category->name }}">
                            <span>{{ $category->name }}</span>
                        </a>
                        @if (indexController::loadLevel2Cate($category->id) != false)
                            <div class="nav--level-1">
                                <ul>
                                    @foreach (IndexController::loadLevel2Cate($category->id) as $category_cat)
                                        <li>
                                            <a href="{{ route('categoriesCat',['name_list'=>$category->name,'id_list'=>$category->id,'name_cat'=>$category_cat->name,'id_cat'=>$category_cat->id]) }}" title="{{ $category_cat->name }}">
                                                {{ $category_cat->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</section>
