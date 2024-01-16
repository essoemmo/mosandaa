@extends('front.layouts.master')

@section('content')
 <style>
     .text-cen{
         text-align:center;
         position:relative;
        
     }
     .Rates {
         padding:50px 0 ;
         
     }
     .Rates h2{
         font-weight:bold;
     }
   .Rates img{
           width: 50px;
    height: 50px;
    border-radius: 50%;
  
   }
   .card_rates {
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        padding:10px;
        margin:20px 0;
        
    text-align: center;
        border-radius:10px;
   }
   .card_rates h3{
       font-weight:bold;
   }
   .card-rate-content{
       padding:5px 0;
   }
   .modal-body  label {
    display: block;
    color: #624975;
}
.modal-body  input {
    width: 80%;
    background: rgba(102, 77, 121, 0.1);
    border: 1px solid #664D79;
    padding: 10px;
    border-radius: 5px;
}
.modal-body  textarea {
    width: 80%;
    background: rgba(102, 77, 121, 0.1);
    border: 1px solid #664D79;
    padding: 10px;
    border-radius: 5px;
    height: 100px;
    resize: none;
}
.modal-body  input[type="submit"] {
    background: #664D79;
    border: 1px solid #664D79;
    color: #fff;
    font-weight: bold;
}

 </style>
    <div class="Rates">
        <div class="container">
        <div class="row">
            <div class="col-lg-6  text-cen">
             <div class="rate_inputs">
                 
<svg width="400px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500"><defs><clipPath id="freepik--clip-path--inject-41"><path d="M264.56,109c20.71-12,37.49-2.26,37.49,21.65s-16.78,53-37.49,64.94-37.49,2.26-37.49-21.65S243.85,121,264.56,109Z" style="fill:#f5f5f5"></path></clipPath></defs><g id="freepik--Floor--inject-41"><path id="freepik--SUELO--inject-41" d="M110,426C190.1,464.17,319.9,464.17,400,426S480,326,400,287.83s-209.86-38.16-289.92,0S30,387.85,110,426Z" style="fill:#ebebeb"></path></g><g id="freepik--Cloud--inject-41"><path id="freepik--nube--inject-41" d="M368.08,142.3l3.68-2.83v-8.1c0-6.41,5.11-13.86,10.67-17.07h0c5.56-3.21,10.07-.61,10.07,5.81v1.17a14.33,14.33,0,0,1,4.66-4.67h0c4-2.31,7.25-.44,7.25,4.18v.54l7.36-4.25c2.63-1.52,4.77-.29,4.77,2.75a10.55,10.55,0,0,1-4.77,8.26l-43.69,25.22c-2.63,1.52-4.77.29-4.77-2.75A10.55,10.55,0,0,1,368.08,142.3Z" style="fill:#ebebeb"></path></g><g id="freepik--Plants--inject-41"><g id="freepik--HOJAS--inject-41"><path d="M104.09,362.44c-.52-.09-1.07-.25-1.69-.41a63.16,63.16,0,0,1-6.17-2A45.07,45.07,0,0,1,84.94,354a18.34,18.34,0,0,1-4.78-5,9.1,9.1,0,0,1-1.25-6.67,6.1,6.1,0,0,1,4.66-4.63c1.07-.17,2.18,0,3.25-.19a2.58,2.58,0,0,0,2.31-2,3.31,3.31,0,0,0-.48-1.74,80.56,80.56,0,0,1-5-11.07,17.26,17.26,0,0,1-.2-10.52,17.83,17.83,0,0,1,5.38-8.87c1.2-1,2.86-1.86,4.31-1.23A3.59,3.59,0,0,1,95,304.43a14.21,14.21,0,0,1,.34,3.06A26.22,26.22,0,0,0,96.6,314a5.87,5.87,0,0,0,2.14,3.31c1.86,1.16,4.42.25,6.4,1.19s2.66,3.1,2.75,5.14-.32,4.1-.09,6.13a3.77,3.77,0,0,0,.59,1.8,7.93,7.93,0,0,0,1.89,1.49,8,8,0,0,1,2.9,6.28,21.68,21.68,0,0,1-1.35,7,62,62,0,0,0-2,9.58,11.5,11.5,0,0,1-2.44,5.41A3.12,3.12,0,0,1,104.09,362.44Z" style="fill:#BA68C8"></path><path d="M107.41,360.78a.34.34,0,0,1-.29-.17c-11.67-19.68-15.36-33.54-16.41-41.71-1.15-8.9.47-13.07.54-13.24a.34.34,0,1,1,.64.25c0,.07-1.62,4.26-.49,13,1,8.09,4.74,21.83,16.31,41.36a.34.34,0,0,1-.12.47A.41.41,0,0,1,107.41,360.78Z" style="fill:#fff"></path><path d="M101.17,349.37h0c-14.22-1.56-18.24-6.23-18.41-6.43a.34.34,0,0,1,0-.48.33.33,0,0,1,.48,0h0c0,.05,4.06,4.66,17.95,6.19a.35.35,0,0,1,0,.69Z" style="fill:#fff"></path><path d="M97.16,340.51a.35.35,0,0,1-.21-.07.34.34,0,0,1-.06-.48c4.51-5.93,4.8-15.65,4.81-15.75a.33.33,0,0,1,.35-.33.33.33,0,0,1,.33.35c0,.41-.3,10-4.94,16.14A.35.35,0,0,1,97.16,340.51Z" style="fill:#fff"></path><path d="M388.6,301.66c1.38-9.3,1.4-20.65-5.43-37.23s-4.71-25.27,2.61-27.64,23.54,10.22,22.94,31.39c-.59,20.44-14.4,37.32-14.4,37.32Z" style="fill:#BA68C8"></path><path d="M388.6,301.66c1.38-9.3,1.4-20.65-5.43-37.23s-4.71-25.27,2.61-27.64,23.54,10.22,22.94,31.39c-.59,20.44-14.4,37.32-14.4,37.32Z" style="opacity:0.1"></path><path d="M392.17,304.4a.31.31,0,0,1-.13,0,.33.33,0,0,1-.18-.45c.07-.17,7.55-17.64,7-33.5-.62-18.25-10.73-28.29-10.83-28.39a.34.34,0,1,1,.48-.49c.1.1,10.4,10.31,11,28.86.55,16-7,33.62-7.06,33.79A.35.35,0,0,1,392.17,304.4Z" style="fill:#fff"></path><path d="M389,309.91s3.86-22.48,17.56-35.4,36.54-15.38,43.7-8.48,2.57,13.61-7.52,15.94c-11.4,2.63-18.39,7.23-11.4,10.75,6.49,3.26,5.76,10.33-1,13.72-10.8,5.42-30.3.26-35,10.92Z" style="fill:#BA68C8"></path><path d="M391.9,314.67l-.11,0a.35.35,0,0,1-.21-.44,70.78,70.78,0,0,1,14.32-23.77A66.37,66.37,0,0,1,423,277.17a62.32,62.32,0,0,1,20.42-7,.35.35,0,0,1,.38.31.34.34,0,0,1-.3.38,61.62,61.62,0,0,0-20.2,7c-10,5.43-23.57,16.2-31.1,36.65A.36.36,0,0,1,391.9,314.67Z" style="fill:#fff"></path><path d="M398.85,300.53a.35.35,0,0,1-.33-.23.35.35,0,0,1,.21-.44c11.69-4.08,28.45-1.94,28.62-1.92a.34.34,0,1,1-.09.68c-.16,0-16.77-2.14-28.3,1.89A.22.22,0,0,1,398.85,300.53Z" style="fill:#fff"></path></g></g><g id="freepik--social-media--inject-41"><g id="freepik--redes-sociales--inject-41"><path d="M118.45,70A9.84,9.84,0,0,0,114,62.29l-3.63-2.1a9.83,9.83,0,0,0-8.9,0L72.76,76.76a9.21,9.21,0,0,0-3.24,3.49,9.47,9.47,0,0,0-1.2,3.69c0,.18,0,.36,0,.54v33.14a9.84,9.84,0,0,0,4.46,7.71l3.62,2.1.46.24.17.07.31.13.24.09.26.09.29.08.22.06.34.08.17,0,.41.07h.08a9.67,9.67,0,0,0,6-.95L114,110.86a9.86,9.86,0,0,0,4.46-7.72Z" style="fill:#BA68C8"></path><path d="M82.14,87.33A10,10,0,0,0,81,90.07,10,10,0,0,1,85.29,84L114,67.43c2.46-1.42,4.46-.27,4.46,2.57A9.84,9.84,0,0,0,114,62.29l-3.63-2.1a9.83,9.83,0,0,0-8.9,0L72.76,76.76a9.21,9.21,0,0,0-3.24,3.49l.09-.16Z" style="fill:#fff;opacity:0.4"></path><path d="M84.37,127.85l-.21.06h0l-.36.07h0l-.34,0h-.35a2.15,2.15,0,0,1-1.14-.43l0,0-.16-.15-.09-.08-.12-.15-.1-.13-.1-.16-.09-.16s0-.11-.07-.17a1.54,1.54,0,0,1-.08-.19L81,126.2,81,126c0-.06,0-.12,0-.18a2.54,2.54,0,0,1,0-.29.78.78,0,0,1,0-.16c0-.15,0-.31,0-.48V91.72a6.53,6.53,0,0,1,.09-1.07v0c0-.13,0-.27.08-.4l0-.16a10,10,0,0,1,1.1-2.74L69.61,80.09l-.09.16a9.47,9.47,0,0,0-1.2,3.69c0,.18,0,.36,0,.54v33.14a9.84,9.84,0,0,0,4.46,7.71l3.62,2.1.46.24.17.07.31.13.24.09.26.09.29.08.22.06.34.08.17,0,.41.07h.08A10.27,10.27,0,0,0,84.37,127.85Z" style="opacity:0.1"></path><path d="M105.91,100.39a33,33,0,0,0,2.88-13.62,25.62,25.62,0,0,0,2.35-4.61,17,17,0,0,1-2.71,2.55A12.52,12.52,0,0,0,110.5,80a18.45,18.45,0,0,1-3,3.26,2.89,2.89,0,0,0-3.45,0c-3,1.76-5.28,6.84-4.59,10.38-3.92,2-7.4,1.5-9.72-1-1.24,3.54-.64,6.9,1.46,7.55a3.34,3.34,0,0,1-2.14.45c0,3,1.51,4.77,3.78,4.06a5.72,5.72,0,0,1-2.13,1.34c.6,2.15,2.34,3,4.41,1.83a16.3,16.3,0,0,1-7,6.63c2.08.58,4.56.19,7.23-1.35,4.66-2.69,8.24-7.56,10.53-12.83" style="fill:#fff"></path><path d="M118.45,190.67A9.84,9.84,0,0,0,114,183l-3.63-2.1a9.83,9.83,0,0,0-8.9,0l-28.7,16.57a9.21,9.21,0,0,0-3.24,3.49,9.47,9.47,0,0,0-1.2,3.69c0,.18,0,.36,0,.54v33.14A9.84,9.84,0,0,0,72.76,246l3.62,2.1.46.23.17.08.31.13.24.09.26.09.29.08.22.06.34.08.17,0,.41.07h.08a9.67,9.67,0,0,0,6-1L114,231.53a9.86,9.86,0,0,0,4.46-7.72Z" style="fill:#BA68C8"></path><path d="M82.14,208a10,10,0,0,0-1.1,2.74,10,10,0,0,1,4.25-6.07L114,188.1c2.46-1.42,4.46-.27,4.46,2.57A9.84,9.84,0,0,0,114,183l-3.63-2.1a9.83,9.83,0,0,0-8.9,0l-28.7,16.57a9.21,9.21,0,0,0-3.24,3.49l.09-.16Z" style="fill:#fff;opacity:0.4"></path><path d="M84.37,248.52l-.21.06h0a2.33,2.33,0,0,1-.36.08h0l-.34,0h-.35a2.15,2.15,0,0,1-1.14-.43l0,0-.16-.15-.09-.08-.12-.16-.1-.12-.1-.16-.09-.16c0-.06,0-.11-.07-.17a1.19,1.19,0,0,1-.08-.2l-.06-.17-.06-.24s0-.11,0-.17a2.54,2.54,0,0,1,0-.29.78.78,0,0,1,0-.16c0-.15,0-.32,0-.49V212.39a6.53,6.53,0,0,1,.09-1.07v0c0-.14,0-.27.08-.4l0-.16a10,10,0,0,1,1.1-2.74l-12.53-7.24-.09.16a9.47,9.47,0,0,0-1.2,3.69c0,.18,0,.36,0,.54v33.14A9.84,9.84,0,0,0,72.76,246l3.62,2.1.46.23.17.08.31.13.24.09.26.09.29.08.22.06.34.08.17,0,.41.07h.08A10.27,10.27,0,0,0,84.37,248.52Z" style="opacity:0.1"></path><path d="M99.64,206c2.94-1.7,3.29-1.88,4.45-2.48a5,5,0,0,1,2-.68,1.74,1.74,0,0,1,1.26.37,2.33,2.33,0,0,1,.83,1.21,8.11,8.11,0,0,1,.38,2.51c.05,1.51.06,2,.06,5.89s0,4.38-.06,6a13.4,13.4,0,0,1-.38,2.94,8.85,8.85,0,0,1-.83,2.16,7.9,7.9,0,0,1-1.26,1.83,9.71,9.71,0,0,1-2,1.68c-1.16.74-1.51,1-4.45,2.65s-3.28,1.89-4.44,2.49a5,5,0,0,1-2,.67,1.76,1.76,0,0,1-1.27-.37,2.37,2.37,0,0,1-.82-1.21,8.08,8.08,0,0,1-.38-2.5c0-1.52-.07-2-.07-5.89s0-4.39.07-6a13.61,13.61,0,0,1,.38-3,9.42,9.42,0,0,1,.82-2.16,8.39,8.39,0,0,1,1.27-1.83,9.45,9.45,0,0,1,2-1.68c1.16-.74,1.51-1,4.44-2.65m0-2.64c-3,1.72-3.36,2-4.53,2.7a12.73,12.73,0,0,0-2.67,2.23,12.39,12.39,0,0,0-2,2.81,14.61,14.61,0,0,0-1.27,3.33,17.73,17.73,0,0,0-.51,3.86c0,1.59-.07,2.1-.07,6.08s0,4.48.07,6a10.75,10.75,0,0,0,.51,3.27,3.73,3.73,0,0,0,1.27,1.86,2.77,2.77,0,0,0,2,.57,6.64,6.64,0,0,0,2.67-.86c1.17-.61,1.54-.81,4.53-2.53s3.36-2,4.54-2.71a12.72,12.72,0,0,0,4.62-5,14.39,14.39,0,0,0,1.26-3.33,17.57,17.57,0,0,0,.52-3.85c0-1.6.06-2.11.06-6.09s0-4.47-.06-6a10.56,10.56,0,0,0-.52-3.26,3.78,3.78,0,0,0-1.26-1.87,2.75,2.75,0,0,0-2-.56,6.48,6.48,0,0,0-2.67.86c-1.18.6-1.55.8-4.54,2.53m0,7.13c-3.12,1.8-5.65,6.63-5.65,10.79s2.53,6.07,5.65,4.27,5.65-6.63,5.65-10.79-2.53-6.07-5.65-4.27m0,12.42c-2,1.17-3.66-.07-3.66-2.77s1.64-5.84,3.66-7,3.67.07,3.67,2.78-1.64,5.83-3.67,7m7.19-16.87c0-1-.59-1.42-1.32-1a3.16,3.16,0,0,0-1.32,2.53c0,1,.59,1.41,1.32,1a3.16,3.16,0,0,0,1.32-2.52" style="fill:#fff"></path><path d="M168.41,113.51A9.83,9.83,0,0,0,164,105.8l-3.63-2.1a9.85,9.85,0,0,0-8.91,0l-28.7,16.57a10.07,10.07,0,0,0-4.43,7.18c0,.18,0,.36,0,.54v33.14a9.83,9.83,0,0,0,4.45,7.71l3.63,2.1.46.24.17.07.31.13.23.09.27.09.28.08.23.06.34.08.17,0,.41.07h.08a9.68,9.68,0,0,0,6-.95L164,154.37a9.85,9.85,0,0,0,4.45-7.72Z" style="fill:#BA68C8"></path><path d="M132.11,130.84a10.38,10.38,0,0,0-1.11,2.74,10,10,0,0,1,4.26-6.07L164,110.94c2.46-1.42,4.45-.27,4.45,2.57A9.83,9.83,0,0,0,164,105.8l-3.63-2.1a9.85,9.85,0,0,0-8.91,0l-28.7,16.57a9.26,9.26,0,0,0-3.23,3.49l.08-.16Z" style="fill:#fff;opacity:0.4"></path><path d="M134.34,171.36l-.22.06h0a2.21,2.21,0,0,1-.35.08h0l-.33,0H133a2.14,2.14,0,0,1-1.13-.43l0,0-.16-.15-.09-.08-.13-.16-.09-.12a.86.86,0,0,1-.1-.16l-.09-.16c0-.05,0-.11-.08-.17l-.07-.19-.06-.18q0-.11-.06-.24a.85.85,0,0,1,0-.17,2.54,2.54,0,0,1,0-.29.78.78,0,0,1,0-.16,3.77,3.77,0,0,1,0-.48V135.23a7.85,7.85,0,0,1,.09-1.07v0c0-.14,0-.27.07-.4a1.1,1.1,0,0,0,0-.16,10.38,10.38,0,0,1,1.11-2.74l-12.54-7.24-.08.16a9.31,9.31,0,0,0-1.2,3.69c0,.18,0,.36,0,.54v33.14a9.83,9.83,0,0,0,4.45,7.71l3.63,2.1.46.24.17.07.31.13.23.09.27.09.28.08.23.06.34.08.17,0,.41.07h.08A10.27,10.27,0,0,0,134.34,171.36Z" style="opacity:0.1"></path><path d="M146.51,159.32l4.79-2.77v-16l3.34-1.93.35-5.56-3.69,2.13v-3.05c0-1.26.19-1.87,1.1-2.39l2.59-1.5v-5.56l-3.31,1.92a9.71,9.71,0,0,0-5.17,9.08V138L144,139.41v5.42l2.49-1.43Z" style="fill:#fff"></path></g></g><g id="freepik--Device--inject-41"><g id="freepik--MÓVIL--inject-41"><path id="freepik--sombra-movil--inject-41" d="M103.56,368l114.73,66.22a9.6,9.6,0,0,0,8.7,0L405.91,330.93c2.4-1.39,2.4-3.63,0-5L291.18,259.67a9.58,9.58,0,0,0-8.69,0L103.56,363C101.16,364.36,101.16,366.6,103.56,368Z" style="fill:#e0e0e0"></path><path d="M107.17,352l111.48,64.37a9.72,9.72,0,0,0,8.79,0L404.19,314.34c2.43-1.4,2.43-3.67,0-5.07L292.7,244.9a9.72,9.72,0,0,0-8.79,0L107.17,347C104.74,348.35,104.74,350.62,107.17,352Z" style="fill:#37474f"></path><path d="M218.65,416.39,107.17,352c-2.17-1.25-2.4-3.2-.69-4.6a9.84,9.84,0,0,0-3.71,7.14v4.13a9.73,9.73,0,0,0,4.4,7.62l111.48,64.36a9,9,0,0,0,4.4,1.05V417.44A9,9,0,0,1,218.65,416.39Z" style="fill:#455a64"></path><path d="M404.19,328.62a9.7,9.7,0,0,0,4.39-7.61v-4.13a9.83,9.83,0,0,0-3.71-7.14c1.71,1.4,1.49,3.35-.68,4.6L227.44,416.39a9,9,0,0,1-4.39,1.05v14.28a9,9,0,0,0,4.39-1.05Z" style="fill:#263238"></path><path d="M167,381.73a13.47,13.47,0,0,0,12.21,0c3.37-2,3.37-5.1,0-7.05a13.54,13.54,0,0,0-12.21,0C163.67,376.63,163.67,379.79,167,381.73Z" style="fill:#263238"></path><path d="M236,402.73,129.29,341.08c-1.45-.84-1.45-2.21,0-3.05l139-80.28a5.83,5.83,0,0,1,5.27,0L380.27,319.4c1.46.84,1.46,2.2,0,3l-139,80.29A5.83,5.83,0,0,1,236,402.73Z" style="fill:#fff"></path><path d="M340.38,281.61a3.43,3.43,0,0,0,3.09,0,1,1,0,0,0,0-1.79,3.43,3.43,0,0,0-3.09,0C339.52,280.31,339.52,281.11,340.38,281.61Z" style="fill:#263238"></path><path d="M345.32,295.63a6.86,6.86,0,0,0,6.18,0c1.71-1,1.71-2.59,0-3.57a6.8,6.8,0,0,0-6.18,0C343.61,293,343.61,294.64,345.32,295.63Z" style="fill:#263238"></path><path d="M341,289.41c1.14-.65,1.08-1.75-.14-2.45l-20.34-11.75a4.71,4.71,0,0,0-4.26-.08c-1.14.66-1.08,1.76.14,2.46l20.34,11.75A4.71,4.71,0,0,0,341,289.41Z" style="fill:#263238"></path><path d="M266.49,274.33c-1.46.84-1.46,2.2,0,3l81.3,46.95a5.85,5.85,0,0,0,5.28,0l18-10.37-86.58-50Z" style="fill:#ebebeb"></path><path d="M267.09,282.48l-6.49-3.74a1.93,1.93,0,0,0-1.75,0l-4.09,2.36c-.49.28-.49.73,0,1l.56.33-2.07,1.1c-.24.13-.22.21.06.19l3.64-.35,4.3,2.48a2,2,0,0,0,1.76,0l4.08-2.36A.54.54,0,0,0,267.09,282.48Z" style="fill:#ebebeb"></path><path d="M269,292.24l-.48-1c-.62-1.31-1-3.09.8-4.12a4.87,4.87,0,0,1,4.4,0c.94.54,1.15,1.35.63,2a4.85,4.85,0,0,1,3.49.36,1.33,1.33,0,0,1,0,2.53c-1.76,1-4.84.82-7.11.47Z" style="fill:#ebebeb"></path><path d="M179.9,327.36l81.31,46.95a5.85,5.85,0,0,0,5.28,0l63.32-36.57c1.45-.84,1.45-2.2,0-3L248.5,287.75a5.85,5.85,0,0,0-5.28,0L179.9,324.32C178.44,325.16,178.44,326.52,179.9,327.36Z" style="fill:#ebebeb"></path><path d="M180.52,332.47,174,328.72a2,2,0,0,0-1.76,0l-4.09,2.36a.54.54,0,0,0,0,1l.57.33-2.07,1.09c-.25.13-.22.22,0,.19l3.64-.34,4.3,2.48a2,2,0,0,0,1.76,0l4.09-2.37A.53.53,0,0,0,180.52,332.47Z" style="fill:#ebebeb"></path><path d="M182.38,342.22l-.47-1c-.63-1.31-1-3.09.8-4.13a4.85,4.85,0,0,1,4.39,0c1,.55,1.16,1.36.63,2a5,5,0,0,1,3.5.36,1.34,1.34,0,0,1,0,2.54c-1.76,1-4.84.82-7.12.47Z" style="fill:#ebebeb"></path><path d="M156.65,337.74a5.85,5.85,0,0,1,5.28,0l81.3,46.94c1.46.84,1.46,2.21,0,3.05l-16.59,9.58-86.56-50Z" style="fill:#ebebeb"></path><path d="M247,326.93l-46.28,12.43h0l60.51,34.94a5.85,5.85,0,0,0,5.28,0l1.31-.76,26.11-38.31-55.45,10.88Z" style="fill:#e0e0e0"></path><path d="M269.79,300.05l-21.29-12.3a5.85,5.85,0,0,0-5.28,0l-23.8,13.75c1.09,2.07,3.34,4,6.75,5.67,10,4.78,26.28,4.78,36.31,0C266.68,305.17,269.11,302.65,269.79,300.05Z" style="fill:#e0e0e0"></path><path d="M372.46,295.72,265.74,234.08a5.83,5.83,0,0,0-5.27,0l-139,80.28c-1.45.84-1.45,2.2,0,3l22.56,13,84.19,48.63a5.83,5.83,0,0,0,5.27,0l125.12-72.29,13.84-8C373.92,297.93,373.92,296.56,372.46,295.72Z" style="fill:#fff;opacity:0.2"></path><path d="M372.72,295.28l-88.24-51L266,233.64a6.34,6.34,0,0,0-5.78,0l-139,80.28a2.1,2.1,0,0,0,0,3.92l22.56,13L228,379.5a6.32,6.32,0,0,0,5.78,0l125.11-72.29,13.85-8a2.11,2.11,0,0,0,0-3.93Zm-.51,3.05-13.85,8L233.25,378.62a5.34,5.34,0,0,1-4.77,0L144.29,330l-22.55-13a1.12,1.12,0,0,1,0-2.17l139-80.28a5.37,5.37,0,0,1,4.77,0L284,245.2l88.24,51a1.12,1.12,0,0,1,0,2.17Z" style="fill:#fff"></path></g></g><g id="freepik--speech-bubble--inject-41"><path d="M324.57,45.74c1.47-.85,2.67-.16,2.67,1.54V243.87a5.93,5.93,0,0,1-2.67,4.63l-76.72,44.3-9,30c-.81,2.72-2.43,2.84-3.61.25L227,304.86l-22.4,12.93c-1.47.85-2.67.16-2.67-1.54V119.66a5.91,5.91,0,0,1,2.67-4.63Z" style="fill:#BA68C8"></path><path d="M314.77,197.5a8.1,8.1,0,0,1-3.79,6.29l-42.15,24.34c-2.09,1.2-3.79.35-3.79-1.92a8.14,8.14,0,0,1,3.79-6.29L311,195.59C313.08,194.38,314.77,195.24,314.77,197.5Z" style="fill:#fff"></path><path d="M307,221.81a8.13,8.13,0,0,1-3.79,6.29L268.2,248.34c-2.09,1.21-3.78.35-3.78-1.92a8.1,8.1,0,0,1,3.78-6.28l35.05-20.24C305.34,218.69,307,219.55,307,221.81Z" style="fill:#fff"></path><path d="M243.85,256.39l-.09-1.18c-1.91,4.82-4.79,8.28-8,10.13-5.67,3.28-10.74.37-10.74-8.31,0-8.18,4-17.15,10.23-20.72,4.09-2.36,6.88-.62,7.34.41v-2c0-1.11,1.13-2.66,2.51-3.46s2.52-.07,2.52,1.64v18.55c0,2.36.88,2.84,2.13,2.11,2.28-1.31,4.38-6.92,4.38-13.31,0-12.34-6.47-18.09-16.79-12.13-9.67,5.58-17.34,19.68-17.34,32,0,12.09,7.25,16.7,16.74,11.23a28.07,28.07,0,0,0,7.14-6.35c1.08-1.32,2.26-1.72,2.78-.78s.2,2.88-.87,4.2a36.52,36.52,0,0,1-9,8.08c-11.81,6.81-20.74.87-20.74-14.07,0-15.26,9.35-32.37,21.34-39.3s20.78-.77,20.78,14.67c0,9.36-3.67,17.56-8.88,20.56C246.41,259.94,244.36,259.57,243.85,256.39Zm-13.39-2.81c0,4.78,2.32,7.4,5.86,5.36s6-7.28,6-12.11c0-4.65-2.37-7-6.05-4.88C232.78,243.93,230.46,249,230.46,253.58Z" style="fill:#fff"></path></g><g id="freepik--Character--inject-41"><path d="M264.56,109c20.71-12,37.49-2.26,37.49,21.65s-16.78,53-37.49,64.94-37.49,2.26-37.49-21.65S243.85,121,264.56,109Z" style="fill:#fff"></path><path d="M264.56,109c20.71-12,37.49-2.26,37.49,21.65s-16.78,53-37.49,64.94-37.49,2.26-37.49-21.65S243.85,121,264.56,109Z" style="fill:#f5f5f5"></path><g style="clip-path:url(#freepik--clip-path--inject-41)"><path d="M250.89,140.75a6.71,6.71,0,0,0-4.28,2.66c-1.84,2.37-1.46,5.75,0,13.36l5.69-.87Z" style="fill:#263238"></path><path d="M284.05,129.55a11,11,0,0,0,3.56-1.68c1.75-1.47,2.2.4,1.24,2.38a11.71,11.71,0,0,1-6.59,6.16c-.06-.24-1.64-4-1.64-4Z" style="fill:#263238"></path><path d="M254.16,180s-10.6,6.84-12.9,9.25-3.25,9.92-4.1,19.11c0,0,12.07,5.09,31-4.28s20.64-16.78,20.64-16.78-2.45-11.13-3.36-14.22c-1.15-3.91-3.37-6.73-16.28-.87Z" style="fill:#263238"></path><path d="M253.56,155.57c-.85.73-2.05-.57-3.09-1.38s-4.44-1.39-6.14,2.64,2.2,7.89,4.5,8.88a4.4,4.4,0,0,0,4.73-.86l.6,15.15s3,5.19,11.2,4.11,6.49-9.32,3.81-11.9l0-3.12s4.23-.28,6.22-1.34c1.07-.57,3.61-4.33,5.25-8.21a33.83,33.83,0,0,0,2.18-22.91c-2.93-11.68-16.32-8.47-24.3-1.31S253.56,155.57,253.56,155.57Z" style="fill:#ffa8a7"></path><path d="M286.36,117.83c-.72-2.36-1.16-1.94-6.95,2.13a46.14,46.14,0,0,1-14.58,6.83c-4.08,1.24-9.66,2.22-12.53,6a8.78,8.78,0,0,0-1.78,5.67,2,2,0,0,0-.86-.47c-1.41-.38-3.14.65-3.87,2.31l5,1.33c-.39,2.88-1.51,11.77-.29,12.55,1.05.67,2.66,2.92,3.09,2.8,1.43-.41,2-6.75,2.78-10.59.85-4.37,1.18-6,2.75-6.18a88.58,88.58,0,0,0,15-3.73c5.4-2.11,6.95-3.9,6.95-3.9l2.88-1.83A16.14,16.14,0,0,0,286.36,117.83Z" style="fill:#263238"></path><path d="M269.15,169.09s-7.57.51-10.21-.19a5.92,5.92,0,0,1-3.66-2.64,8.66,8.66,0,0,0,2.08,3.71c1.93,2,11.79,1.14,11.79,1.14Z" style="fill:#f28f8f"></path><path d="M267.22,160.3l3.46.37a2.43,2.43,0,0,1-2.35,1.78C267.37,162.35,266.88,161.39,267.22,160.3Z" style="fill:#f28f8f"></path><polygon points="272.22 146.8 272.72 155.79 277.49 152.9 272.22 146.8" style="fill:#f28f8f"></polygon><path d="M267.33,150a2.14,2.14,0,0,1-1.51,2,1.15,1.15,0,0,1-1.52-1.17,2.15,2.15,0,0,1,1.52-2A1.14,1.14,0,0,1,267.33,150Z" style="fill:#263238"></path><path d="M265.72,144.69l-3.24,2.66a2.31,2.31,0,0,1,.76-2.79A1.6,1.6,0,0,1,265.72,144.69Z" style="fill:#263238"></path><path d="M280.86,141.89l-3-1.48a2.13,2.13,0,0,1,2.58-1.09A1.77,1.77,0,0,1,280.86,141.89Z" style="fill:#263238"></path><path d="M280,146.17a2.16,2.16,0,0,1-1.51,2,1.15,1.15,0,0,1-1.52-1.17,2.15,2.15,0,0,1,1.52-2A1.14,1.14,0,0,1,280,146.17Z" style="fill:#263238"></path></g></g></svg>
                  <h2>اترك تعليقا</h2>
                    <form id="addRate" method="POST" data-parsley-validate>
                        @csrf
                        @method('post')
                        <div class="modal-body">
                        <label for="name">@lang('website.name')</label>
                        <input name="name" type="text" required>
                        <label for="">@lang('website.comment')</label>
                        <textarea name="comment" id="" cols="30" rows="10" required></textarea>
                        <input type="submit" name="submit" style="margin-top: 20px;" value="@lang('website.save')">
                        </div>
                    </form>
             </div>
            </div>
            <div class="col-lg-6 ">
          <div class="swiper mySwiperrer" style="height:400px" >
    <div class="swiper-wrapper">
  

    
             @foreach ($reviews as $rev)
                 <div class="swiper-slide" >
                   <div class="card_rates" style="width:93%">
                <img src="https://www.w3schools.com/howto/img_avatar.png" style="margin:auto" />
                <div class="card-rate-content">
                    <h3>{{$rev->name}}</h3>
                    <p>{{$rev->comment}}</p>
                </div>
            </div>
            </div>
            
            @endforeach
            
            </div>
    <div class="swiper-pagination"></div>
  </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('js')
    <script>
     var swiper = new Swiper(".mySwiperrer", {
          autoplay: {
    delay: 3000,
  },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
    $('body').on('submit','#addRate',function (e) {
           e.preventDefault();
        $.ajax({
            url: "{{ route('storerate') }}",
            method: "post",
            data: new FormData(this),
            dataType: 'json',
            cache       : false,
            contentType : false,
            processData : false,
         success: function (response) {
            if(response.status == 'success'){
                swal("@lang('website.rateadd')", response.message, "success");
                $('input[type="text"],textarea').val('');

            }

            },

         });
    });
    </script>
@endpush
