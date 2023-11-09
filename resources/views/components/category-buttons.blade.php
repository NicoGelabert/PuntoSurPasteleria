<div class="px-5 max-w-screen-xl mx-auto flex justify-evenly items-center my-20">
    <div id="categoryimagesection" class="hidden sm:inline-block mix-blend-multiply max-w-[350px] lg:w-3/5">
        <img src="{{ asset('storage/img/muffins.png') }}" alt="">
    </div>
    <div id="categorybuttons">
        <a href="" class="" alt="">
            <img src="{{ asset('storage/iconos/tartas.svg') }}" class="" alt="tartas" />
            <h5>Tartas y Muffins</h5>
        </a>
        <a href="" class="" alt="">
            <img src="{{ asset('storage/iconos/empanadas.svg') }}" class="" alt="tartas" />
            <h5>Empanadas</h5>
        </a>
        <a href="" class="" alt="">
            <img src="{{ asset('storage/iconos/desayunos.svg') }}" class="" alt="tartas" />
            <h5>Desayunos</h5>
        </a>
        <a href="" class="" alt="">
            <img src="{{ asset('storage/iconos/encargos.svg') }}" class="" alt="tartas" />
            <h5>Encargos especiales</h5>
        </a>
    </div>
</div>

<script>
    const buttonsContainer = document.getElementById("categorybuttons");
    const childrenButtons = buttonsContainer.querySelectorAll("a")
    childrenButtons.forEach((item,index) =>{
        ((index > 0 && index < 3) || (index > 4 && index < 7)) ? item.classList.add('btn-primary') : item.classList.add('btn-secondary');
    })

</script>