<div class="container" style="margin-top: 80px;">
    <div class="card  card-plain">
        <div class="card-header">
            <h4 class="card-title" style="font-size: 40px;"> Mis cursos </h4>
        </div>
        <div class="card-body">
           <div class="row">
           <?php echo $this->datos; ?>
           </div>
                
            
        </div>
    </div>
</div>


<style>
    ::-webkit-scrollbar {
    display: none;
}
.block{
            background: linear-gradient(to right, #e14eca 0%, rgba(225, 78, 202, 0) 100%);
        }

        .bg-white {
            background-color: rgb(39 41 61 / 25%) !important;
            color: white;
        }

        .navbar.bg-white .navbar-nav a.nav-link {
            color: white;
        }


        .card {
            background: rgb(39 41 61 / 25%);
            border: 0;
            position: relative;
            width: 100%;
            margin-bottom: 30px;
            box-shadow: 0 1px 20px 0px rgb(0 0 0 / 10%);
        }

        .navbar {
            padding: 10px 30px 10px 15px;
            width: 100%;
            z-index: 1050;
            background: #1a1e3482;
        }
</style>