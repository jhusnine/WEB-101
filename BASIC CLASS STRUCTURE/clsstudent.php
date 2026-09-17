<?php
        class Student 
        {
            private string $name;
            public int $age;

            public function_contruct(string $name, int $age)
            {
                $this->name = $name;
                $this->age = $age;
            }
            public function displayName():void
            {
                echo $this->name."-".$this->age;

            }
        }
?>