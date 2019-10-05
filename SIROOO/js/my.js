function show(x){
            v = document.getElementById(x);
            if(x=='ad-sidebar'){
                icon = document.getElementById('head-down-icon');
                if(v.style.display=='block'){
                    v.style.display='none';
                    icon.innerHTML='&#xe313;';
                }
                else{
                    v.style.display='block';
                    icon.innerHTML='&#xe14c;';
                }
            }
