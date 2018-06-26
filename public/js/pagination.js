/**
 * PAGINATION JS
 *
 * Script pour la pagination dans les articles. Corélation PostsController et views post show
 */

var Pagination = {

    $url : '',
    $id: '',
    $pagination  : '',
    $paginActive : '',
    $paginPrev   : '',
    $paginNext   : '',
    $linkPrev    : '',
    $linkNext    : '',

    init: function (){
        this.$url = document.location.href;
        this.$id = this.$url.substring(this.$url.lastIndexOf( "/" )+1 );
        this.$pagination   = $(".pagination");
        this.$paginActive  = $("#pagination-active");
        this.$paginPrev    = $("#paginationPrev");
        this.$paginNext    = $("#paginationNext");
        this.$linkPrev     = this.$paginActive.prev().children().attr("href");
        this.$linkNext     = this.$paginActive.next().children().attr("href");
        this.start();
    },

    start: function (){
        if(this.$paginActive.prev()[0] === this.$paginPrev[0]){
            this.$paginPrev.addClass("page-item disabled");
        }

        if(this.$paginActive.next()[0] === this.$paginNext[0]){
            this.$paginNext.addClass("page-item disabled");
        }

        this.$paginPrev.children().attr("href", this.$linkPrev);
        this.$paginNext.children().attr("href", this.$linkNext);

        $containerPagination = $('.pagination :not(#paginationNext, #paginationPrev)').children('');
        this.updatePaginate();
    },

    updatePaginate: function(){
        $that = this.$pagination.children();
        $start = 0;
        //$position = this.$dataId;
        $end = this.$pagination.children().length - 1;
        $cloneBefore = null;
        $cloneAfter = null;
        $position = this.$id;

        $.each( $that, function($index, $value){
            if($that.length > 8 && $index > 1 && $index < $end - 1){
                if($index < (1* $position + 4) && $index > $position - 4 && $index != $position ){
                    if($position > 2 && $cloneBefore == null ){
                        $cloneBefore = '<li class="page-item disabled"><a class="page-link" href="#">...</a></li>';
                        $($value).before($cloneBefore);
                    }
                    if($position < $end - 2 && $cloneAfter == null && $index == (1*$position + 3) ){
                        $cloneAfter = '<li class="page-item disabled"><a class="page-link" href="#">...</a></li>';
                        $($value).after($cloneAfter);
                    }
                    return;
                }
                if($index != $position){
                    $value.getElementsByTagName('a')[0].style.display = "none";
                }
            }

        });
    }
};

Pagination.init();