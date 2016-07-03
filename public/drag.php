<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery UI Draggable - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <script src="bower_components/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
    <style>
        .draggable { width: 150px; height: 150px; padding: 0.5em; }
        #sortable { list-style-type: none; margin: 0; padding: 0; width: 450px; }
        #sortable  li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; font-size: 4em; text-align: center; }

        .sortable { list-style-type: none; margin: 0; padding: 0; width: 450px; }
        .sortable  li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; font-size: 4em; text-align: center; }
        .sortable {display: inline-block; width: 100%; border: dashed;}
    </style>
    <script>



        $( init );

        function init() {
            $('.draggable').draggable({
                containment: '#content', // contains the item into the
                cursor: 'move',
//                snap: '#content',
                snapMode: 'both' ,
                stack: '.draggable'      //zindex
            });
            $('.draggable').sortable();
            $('.draggable').disableSelection();
        }

        $(function() {

            $('#sortable').sortable();
            $('#sortable').disableSelection();
        }   );

        $(function() {
            $( "#sortable1, #sortable2" ).sortable({
                connectWith: ".connectedSortable"
            }).disableSelection();
        });

//
//        $(function() {
//            $( "#draggable" ).draggable();
//        });
    </script>
</head>
<body>

<div  id="content" class="ui-widget-content" style="height: 400px; background: #1ABB9C ">
    <img class="draggable" src="images/Untitled.png" alt="">
    <img class="draggable" src="images/Untitled.png" alt="">
<!--    <p>Drag me around</p>-->
</div>           \

<!--<div>-->
<!--    <ul id="sortable">-->
<!--        <li>-->
<!--            1-->
<!--        </li>-->
<!--        <li>-->
<!--            2-->
<!--        </li>-->
<!--        <li>-->
<!--            3-->
<!--        </li>-->
<!--    </ul>-->
<!--</div>-->

<div>
    <ul id="sortable1" class="sortable connectedSortable">
        <li>
            1
        </li>
        <li>
            2
        </li>
        <li>
            3
        </li>
    </ul>



    <ul id="sortable2" class="sortable connectedSortable">
        <li>
            5
        </li>
        <li>
            6
        </li>
        <li>
            7
        </li>
    </ul>

</div>


</body>
</html>
