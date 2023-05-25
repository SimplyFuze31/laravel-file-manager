@extends('layouts')

@section('content')
    <header class="m-3">

        <nav>
            <a href="{{route('filepage')}}" class="link-dark" style="text-decoration: none">
                <div class="Logo">
                    {{-- Logo --}}
                    <h3>
                        <span>
                            <svg width="30" height="30" viewBox="0 0 72.97155 135.3773" version="1.1" id="svg5"
                                xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                xmlns:svg="http://www.w3.org/2000/svg">
                                <defs id="defs2" />
                                <g id="layer1" transform="translate(-66.066337,-82.550844)">
                                    <path style="fill:#000000;stroke-width:0.264583"
                                        d="m 131.85273,217.49638 c -1.45187,-0.66983 -64.682696,-63.59765 -65.325376,-65.01232 -0.61469,-1.35309 -0.61469,-3.14902 0,-4.50211 0.64268,-1.41467 63.873506,-64.342488 65.325376,-65.012319 1.86638,-0.861075 4.41956,-0.354188 5.80457,1.152394 1.34532,1.463407 1.76356,3.846967 1.00514,5.728339 -0.28622,0.70999 -8.69668,9.24686 -30.22865,30.682926 l -29.832086,29.69924 29.832346,29.69972 c 21.54,21.44422 29.94251,29.97314 30.22865,30.6834 0.79249,1.96717 0.25188,4.5903 -1.22607,5.949 -1.49386,1.37333 -3.79462,1.75723 -5.5839,0.93173 z"
                                        id="path179" />
                                </g>
                            </svg>
                        </span> 
                        Повернутись на головну
                    </h3>
                </div>
            </a>

        </nav>
    </header>
@endsection