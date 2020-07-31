<?php
class Ics {
    var $data;
    var $name;
    function ics($event_data) {
        $this->name = date('YmdHis');
        if(!empty($event_data)){
            $calData .= "BEGIN:VCALENDAR\nVERSION:2.0\nMETHOD:PUBLISH\n";
            foreach($event_data as $event){
                $calData .= "BEGIN:VEVENT\nDTSTART:".date("Ymd\THis\Z",strtotime($event['start_date']))."\nDTEND:".date("Ymd\THis\Z",strtotime($event['end_date']))."\nLOCATION:".$event['location']."\nTRANSP: OPAQUE\nSEQUENCE:0\nUID:\nDTSTAMP:".date("Ymd\THis\Z")."\nSUMMARY:".$event['name']."\nDESCRIPTION:".$event['description']."\nPRIORITY:1\nCLASS:PUBLIC\nBEGIN:VALARM\nTRIGGER:-PT10080M\nACTION:DISPLAY\nDESCRIPTION:Reminder\nEND:VALARM\nEND:VEVENT\n";
            }
            $calData .= "END:VCALENDAR\n";
            $this->data = $calData;
        }
        
        //$this->data = "BEGIN:VCALENDAR\nVERSION:2.0\nMETHOD:PUBLISH\nBEGIN:VEVENT\nDTSTART:".date("Ymd\THis\Z",strtotime($start))."\nDTEND:".date("Ymd\THis\Z",strtotime($end))."\nLOCATION:".$location."\nTRANSP: OPAQUE\nSEQUENCE:0\nUID:\nDTSTAMP:".date("Ymd\THis\Z")."\nSUMMARY:".$name."\nDESCRIPTION:".$description."\nPRIORITY:1\nCLASS:PUBLIC\nBEGIN:VALARM\nTRIGGER:-PT10080M\nACTION:DISPLAY\nDESCRIPTION:Reminder\nEND:VALARM\nEND:VEVENT\nEND:VCALENDAR\n";
    }
    function save() {
        file_put_contents($this->name.".ics",$this->data);
    }
    function show() {
        header("Content-type:text/calendar");
        header('Content-Disposition: attachment; filename="'.$this->name.'.ics"');
        Header('Content-Length: '.strlen($this->data));
        Header('Connection: close');
        echo $this->data;
    }
}
?>