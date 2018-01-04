<?php

    class Product_dt extends CI_Model implements DatatableModel
	{
    	public function appendToSelectStr() {
		return NULL;
        }

        public function fromTableStr() {
            return 'lectures lect';
        }

        public function joinArray(){
            return NULL;
        }

        public function whereClauseArray(){
            return NULL;
        }	
		
   	}
