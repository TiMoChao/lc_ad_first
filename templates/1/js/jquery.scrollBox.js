(function($) {
    $.fn.scrollBox = function(options){
        var defaultOptions = {
            speed: 0.1, //����
            time: 16,   //�ƶ��ٶ�
            top: 200,   //Ĭ�϶���
            align: 'right', //����λ�ã���ѡ����
            mix: 0          //�߾�
        };
        
        var options = $.extend(defaultOptions, options);

        this.each(function(){
            var obj = $(this);
            init();
            
            function init(){
                obj.css('display', 'block');
                obj.css('position', 'absolute');
                obj.css(options.align, options.mix);
                obj.css('top', options.top+'px');
                obj.css('z-index', '99');
                
                move();
            }

            function back() {
                    acceleration = options.speed;
                    time = options.time;
                    var x1 = 0;
                    var y1 = 0;
                    var x2 = 0;
                    var y2 = 0;
                    if (document.documentElement) {
                            x1 = document.documentElement.scrollLeft || 0;
                            y1 = document.documentElement.scrollTop || 0;
                    }
                    if (document.body) {
                            x2 = document.body.scrollLeft || 0;
                            y2 = document.body.scrollTop || 0;
                    }
                    var x = Math.max(x1, x2);
                    var y = Math.max(y1, y2);
                    var speed = acceleration;
                    return {
                            l: x,
                            t: y,
                            s: speed
                    };
                };
            
            function move(){
                var tip = obj;
                var old = options.top;
                var pos = back().t;

                pos = pos - $(tip).Coordinate().y + options.top;
                pos = $(tip).Coordinate().y + pos / 10;
                if (pos < options.top) {
                    pos = options.top;
                }
                if (pos != old) {
                    tip.css('top',pos + "px");
                }
                old = pos;
                window.setTimeout(function(){move();}, options.time);
            };
        });
    };

    $.fn.Coordinate = function(){
        var E = $(this)[0];
                var C = E.offsetTop;
                var B = E.offsetLeft;
                var A = E.offsetWidth;
                var D = E.offsetHeight;
                while (E = E.offsetParent) {
                        C += E.offsetTop;
                        B += E.offsetLeft;

                }
                return {
                        x: B,
                        y: C,
                        w: A,
                        h: D
                };
    };
})(jQuery);