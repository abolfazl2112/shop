        </div>
        <script type="text/javascript" src="<?=http()?>template/selenshop/js/jquery-2.1.1.min.js"></script>
        <script src="<?=http()?>template/selenshop/materialToast/mdtoast.js"></script>
        <?php
        if(isset($flag)&&$flag!="")
        {
            ?>
            <script>
                $(document).ready(function(){
                    $.mdtoast('<?=$message?>', { duration: 10000, type: $.mdtoast.type.<?=$flag?> });
                });
            </script>
            <?php
        }
        ?>

        <script type="text/javascript" src="<?=http()?>template/selenshop/js/script.js"></script>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="<?=http()?>webapp/contents/js/material.min.js"></script>
        <script>
            var $carousel = $('.carousel').flickity({
                prevNextButtons: false,
                pageDots: false
            });

        </script>

    </body>
</html>