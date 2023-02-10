<div class="sidebar-wrap">
    <div class="sidebar-widget mb-50">
        <h4>@lang("general.search")</h4>
        <form action="{{ route('front.blog.search') }}" method="get" class="search-form">
            <input type="text" name="q" class="form-control" placeholder="@lang("general.type_here")">
            <button class="search-btn" type="button"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="sidebar-widget mb-50">
        <h4>@lang("general.categories")</h4>
        <ul class="cat-list">
            @foreach(\App\Models\BlogCategory::all() as $k=>$v)
            <li><a href="{{ route('front.blog.category',['slug'=>\App\Models\LanguageContent::getSlug(BLOG_CATEGORY_LANGUAGE,$v['id'])]) }}">{{ \App\Models\LanguageContent::getName(BLOG_CATEGORY_LANGUAGE,$v['id']) }}</a><span>({{ \App\Models\Blog::where('categoryId',$v['id'])->count() }})</span></li>
            @endforeach
        </ul>
    </div><!-- Categories -->
    <div class="sidebar-widget mb-50">
        <h4>@lang("general.random_posts")</h4>
        <ul class="recent-posts">
            @foreach(\App\Models\Blog::inRandomOrder('id')->limit(5)->get() as $k =>$v)
            <li>
                <img src="{{ asset(\App\Models\LanguageContent::getImage(BLOG_LANGUAGE,$v['id'])) }}" alt="blog post">
                <div>
                    <h4><a href="{{ route('front.blog.view',['slug'=>\App\Models\LanguageContent::getSlug(BLOG_LANGUAGE,$v['id'])]) }}">{{ \App\Models\LanguageContent::getName(BLOG_LANGUAGE,$v['id']) }}</a></h4>
                    <span class="date"><i class="fa fa-clock-o"></i> {{ $v['date'] }}</span>
                </div>
            </li>
            @endforeach
        </ul>
    </div><!-- Recent Posts -->
</div><!-- /Sidebar Wrapper -->
