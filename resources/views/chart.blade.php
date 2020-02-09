<!doctype html>
<html>
<head>
    <style>
        html,
        body {
            margin: 0px;
            padding: 0px;
            width: 100%;
            height: 100%;
            overflow: hidden;
            font-family: Helvetica;
        }

        #tree {
            width: 100%;
            height: 100%;
        }
    </style>
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet">

    <script src="https://balkangraph.com/js/latest/OrgChart.js"></script>


</head>
<body>
<div id="tree"></div>
</body>
</html>
<script>
    var uri = "{{ url('/api') }}";
    var settings = {
        "async": true,
        "crossDomain": true,
        "method": "GET",

        "headers": {
            "cache-control": "no-cache",
            "Postman-Token": "30d21590-8c00-4a63-b09a-daffa2bddac6",
            "Access-Control-Allow-Origin": "*",
            'Access-Control-Allow-Headers': 'Origin, Content-Type, Accept, Authorization, X-Request-With',
        },

    }
    $.getJSON(uri+"/getdata",settings, function(response)
    {
        var data =[];
        var tag = [
            {
                group: true,
                groupName: "Family",
                groupState: BALKANGraph.EXPAND,
                template: "group_orange"
            }];
        response.forEach(function (isi) {
            data.push({
                "id" : isi.id,
                "nama":isi.nama,
                "pid":isi.pid,
                "title":isi.title,
                "tags":[isi.pasutri]
            });
            tag.push(
                isi.id ={
                    group: true,
                    groupName: "Keluarga "+ isi.nama,
                    groupState: BALKANGraph.EXPAND,
                    template: "group_orange"
                });
        });
        console.log(tag);
        new OrgChart(document.getElementById("tree"), {
            template: "diva",
            enableDragDrop: true,
            nodeBinding: {
                field_0: "nama",
                field_1: "title",
                img_0: "img"
            },
            tags: tag,
            nodes: data
        });
    });
</script>
