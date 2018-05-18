<?php
<?php

Class Newspaper_kiosk
{
    private $list_of_humans;
    private $list_of_newspapers;

    public function __construct()
    {
        $this->list_of_humans = [];
        $this->list_of_newspapers = ['Цивилизация', 'Жизнь и труд', 'Иерархия закономерностей'];
    }

    public function get_newspapper($name_newspapper)
    {
        if (in_array($name_newspapper, $this->list_of_newspapers)) {
            print_r('<br>' . $name_newspapper . ' уже есть' . '<br>');
        } else {
            $this->list_of_newspapers[] = $name_newspapper;
            print_r('<br>' . $name_newspapper . ' поступила в продажу' . '<br>');
            $this->deliver_to_humans($this->list_of_humans, $name_newspapper);
        }
    }

    public function deliver_to_humans($list_of_humans, $name_newspapper)
    {
        foreach ($list_of_humans as $person) {
            $person->get_newspapper($name_newspapper);
        }
    }

    public function register_human($human)
    {
        if (in_array($human, $this->list_of_humans)) {
            print_r('<br>' . $human->askname() . ' уже был подписан' . '<br>');
        } else {
            $this->list_of_humans[] = $human;
            print_r('<br>' . 'Спасибо что подписался ' . $human->askname() . '<br>');
        }
    }

    public function remove_human($human)
    {
        if (in_array($human, $this->list_of_humans)) {
            $index_human_in_array = array_search($human, $this->list_of_humans);
            unset($this->list_of_humans[$index_human_in_array]);
            echo $human->askname() . ' Больше не получает подписку <br>';
        } else {
            echo $human->askname() . '  не получал подписку <br>';
        }
    }

    public function show_newspappers()
    {
        foreach ($this->list_of_newspapers as $n) {
            echo $n . '<br>';
        }
    }
}

Class Human
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function get_newspapper($name_newspapper)
    {
        echo $this->askname() . 'получил новую газету ' . $name_newspapper;
    }

    public function askname()
    {
        echo '<br>My name is ' . $this->name . '<br>';
    }
}

$kiosk = new Newspaper_kiosk();
$kiosk->show_newspappers();
$dima = new Human('Dima');
$ivan = new Human('Ivan');
$dima->askname();
$ivan->askname();
$kiosk->register_human($dima);
$kiosk->register_human($dima);
$kiosk->register_human($ivan);
$kiosk->get_newspapper('Правда');
$kiosk->get_newspapper('Наука и мир');
$kiosk->get_newspapper('Полет на марс');
$kiosk->remove_human($dima);
$kiosk->get_newspapper('something');


?>