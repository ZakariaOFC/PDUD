<?php
    $data_json = array();
    $reqDateTime = 'SELECT * FROM evenements';
    $reqDateTime = $bdd->prepare($reqDateTime);
    $reqDateTime -> execute();

    while($req = $reqDateTime -> fetch(PDO::FETCH_ASSOC)){
        $data_json[] = $req;
    ;}
?>

<script>
    window.onload = () => {
        let evenements = <?php echo json_encode($data_json) ?>;
        let elementCalendrier = document.getElementById("calendrier")
        
        let calendrier = new FullCalendar.Calendar(elementCalendrier,{
            plugins:['dayGrid','timeGrid'],
            locale:'fr',
            firstDay: 1,

            header: {
                left:'prev next today',
                center: 'title',
                right: 'dayGridMonth, timeGridWeek',
            },

            buttonText: {
                today: 'Aujourd\'hui',
                month: 'Mois',
                week: 'Semaine',
                list: 'Liste',
            },
            
            events: evenements,
        })

        calendrier.render();
    }
</script>

<div class="container">
  <div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-10">
        <div id="calendrier" style="padding-top:170px; padding-bottom:200px; height:40%; margin:auto;"></div>
    </div>
    <div class="col-sm-1">
    </div>
  </div>
</div>