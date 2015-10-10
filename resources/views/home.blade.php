@extends("layouts.main")

@section('page_title')
    CV: {{$user->name}}
@stop

@section("main_content")

    <div class="row">
        <div class="col-xs-12">
          <div id="photo-header" class="text-center">
            <!-- PHOTO (AVATAR) -->
            <div id="photo">
              <img src="{{URL::to('/assets/img/display_pic.jpg')}}" alt="avatar">
            </div>
            <div id="text-header">
              <h1>Hello,<br> my name is <span>{{$user->name}}</span><sup>yo</sup> and this is my CV</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-7">
          <!-- ABOUT ME -->
          <div class="box">
            <h2>About Me</h2>
            <p>
                {{$user->description}}
            </p>
          </div>
          <!-- EDUCATION -->
          <div class="box">
            <h2>Education</h2>
            <ul id="education" class="clearfix">
              <li>
                <div class="year pull-left">2010</div>
                <div class="description pull-right">
                  <h3>Secondary School</h3>
                  <p>Attended Government Model Senior Seconday School, Sector 37, Chandigarh completing it with an aggregate of 74.5%</p>
                </div>
              </li>
              <li>
                <div class="year pull-left">2005</div>
                <div class="description pull-right">
                  <h3>Secondary school specializing in artistic</h3>
                  <p>Eos, explicabo, nam, tenetur et ab eius deserunt aspernatur ipsum ducimus quibusdam quis voluptatibus.</p>
                </div>
              </li>
              <li>
                <div class="year pull-left">2009</div>
                <div class="description pull-right">
                  <h3>First level graduation in Graphic Design</h3>
                  <p>Aspernatur, mollitia, quos maxime eius suscipit sed beatae ducimus quaerat quibusdam perferendis? Iusto, quibusdam asperiores unde repellat.</p>
                </div>
              </li>
              <li>
                <div class="year pull-left">2012</div>
                <div class="description pull-right">
                  <h3>Second level graduation in Graphic Design</h3>
                  <p>Ducimus, aliquam tempore autem itaque et accusantium!</p>
                </div>
              </li>
            </ul>
          </div>
          <!-- EXPERIENCES -->
          <div class="box">
            <h2>Experiences</h2>
            <div class="job clearfix">
              <div class="col-xs-3">
                <div class="where">Google</div>
                <div class="year">2013 - 2014</div>
              </div>
              <div class="col-xs-9">
                <div class="profession">Front-end developer / php programmer</div>
                <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, et, illum perferendis veritatis velit sunt similique qui magni totam harum tempore eius laboriosam accusantium necessitatibus voluptatum? Enim, itaque dignissimos quia.</div>
              </div>
            </div>
            <div class="job clearfix">
              <div class="col-xs-3">
                <div class="where">Twitter</div>
                <div class="year">2012</div>
              </div>
              <div class="col-xs-9">
                <div class="profession">Web Developer</div>
                <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, nihil sit nemo voluptatem praesentium. Quia, qui facere consectetur libero asperiores fugiat consequuntur deserunt culpa repudiandae sed quidem voluptas explicabo soluta.</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-5">
          <!-- CONTACT -->
          <div class="box clearfix">
            <h2>Contact</h2>
            @if (isset($contacts))
            @foreach ($contacts as $contact)
            <div class="contact-item">
              <div class="icon pull-left text-center"><span class="fa fa-envelope fa-fw"></span></div>
              <div class="title only pull-right">{{$contact->value}}</div>
            </div>
            @endforeach

            @else
            <div class="contact-item">
              <div class="icon pull-left text-center"><span class="fa fa-phone fa-fw"></span></div>
              <div class="title only pull-right">500 345 242</div>
            </div>
            <div class="contact-item">
              <div class="icon pull-left text-center"><span class="fa fa-envelope fa-fw"></span></div>
              <div class="title only pull-right">office@kamsolutions.pl</div>
            </div>
            <div class="contact-item">
              <div class="icon pull-left text-center"><span class="fa fa-twitter fa-fw"></span></div>
              <div class="title pull-right">Twitter</div>
              <div class="description pull-right">https://twitter.com/WordPress</div>
            </div>
            <div class="contact-item">
              <div class="icon pull-left text-center"><span class="fa fa-facebook fa-fw"></span></div>
              <div class="title pull-right">Facebook</div>
              <div class="description pull-right">https://www.facebook.com/facebook</div>
            </div>
            <div class="contact-item">
              <div class="icon pull-left text-center"><span class="fa fa-skype fa-fw"></span></div>
              <div class="title pull-right">Skype</div>
              <div class="description pull-right">kamsolutions.pl</div>
            </div>
            @endif
          </div>
          <!-- SKILLS -->
          <div class="box">
            <h2>Skills</h2>
            <div class="skills">
                @if (isset($skills) && count($skills) > 0)
                @foreach ($skills as $skill)
                <div class="item-skills" data-percent="{{$skill->proficiency/100.00}}">{{$skill->name}}</div>
                @endforeach

                @else
              <div class="item-skills" data-percent="1.00">HTML</div>
              <div class="item-skills" data-percent="0.90">CSS</div>
              <div class="item-skills" data-percent="0.80">jQuery</div>
              <div class="item-skills" data-percent="0.75">PHP</div>
              <div class="item-skills" data-percent="0.25">Laravel 2 (framework)</div>
                @endif
              <div class="skills-legend clearfix">
                <div class="legend-left legend">Beginner</div>
                <div class="legend-left legend"><span>Proficient</span></div>
                <div class="legend-right legend"><span>Expert</span></div>
                <div class="legend-right legend">Master</div>
              </div>
            </div>
          </div>
          <!-- LANGUAGES -->
          <div class="box">
            <h2>Languages</h2>
            <div id="language-skills">
            @if (isset($languages) && count($languages) > 0)
            @foreach ($languages as $language)
                <div class="skill">{{$language->name}} <div class="icons pull-right"><div style="width: {{$language->pivot->proficiency}}%;" class="icons-red"></div></div></div>
            @endforeach

            @else
              <div class="skill">Polish <div class="icons pull-right"><div style="width: 80%;" class="icons-red"></div></div></div>
              <div class="skill">English <div class="icons pull-right"><div style="width: 60%;" class="icons-red"></div></div></div>
            @endif
            </div>
          </div>
          <!-- HOBBIES -->
          <div class="box">
            <h2>Hobbies</h2>
            @if (isset($hobbies) && count($hobbies) > 0)
            @foreach ($hobbies as $hobby)
            <div class="hobby">{{$hobby->name}}</div>
            @endforeach

            @else
            <div class="hobby">Photography</div>
            <div class="hobby">Fitness</div>
            <div class="hobby">Programming</div>
            @endif
          </div>
        </div>
      </div>

@stop
