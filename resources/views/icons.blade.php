<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="row" id="row">
    @forelse ($icons as $item)
      <i class="fa fa-{{$item['id']}}"></i>
    @empty
        
    @endforelse
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    const {cssRules} = Object.values(document.styleSheets)
      .find(sheet =>
        Object.values(sheet.cssRules).find(rule =>
          (rule.selectorText || '').match(/^.fa/)
        )
      ) || {cssRules: {}};
    let index=0;
    console.log(Object.values(cssRules).map(i => i.selectorText));
    $(document).ready(function () {
        Object.values(cssRules).map(function(i) {
            let icon = String(i.selectorText);
            if(icon !== "undefined")                                         
            {
                if(index++ > 30)
                {
                  $('#row').append('<br/>');
                  index =0;
                }
                //  icon = String(icon.replace('.fa'));
                if(icon.indexOf('::')===-1)
                {
                    
                    $('#row').append(icon+',');

                }
                else
                {
                    // icon = icon.replace('::before');
                    // icon = icon.replace('::after');
                    $('#row').append(icon+',');
                }
            }
                
            return icon;
           
        });

    });

</script>