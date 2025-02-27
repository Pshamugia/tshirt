<?
	class Pagination
	{		
			private $conn;
			private $total_pages;
			private $page;
			private $start;
			private $prev;
			private $next;
			private $lastpage;
			private $lpm1;
			private $data_sql;
			private $adjacents;
			private $targetpage;
			public function __construct($conn, $targetpage, $table, $where, $limit = 6)
			{
				$this->conn = $conn;
				$this->targetpage = $targetpage;
				$this->adjacents = 10;
				$query = "SELECT COUNT(*) as num FROM $table WHERE $where";
				$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
				$this->total_pages = $total_pages['num'];				
				$this->page = $_GET['page'];
				if($this->page) 
					$this->start = ($this->page - 1) * $limit;
				else
					$this->start = 0;
				
				if ($this->page == 0) $this->page = 1;
				$this->prev = $this->page - 1;
				$this->next = $this->page + 1;
				$this->lastpage = ceil($this->total_pages/$limit);
				$this->lpm1 = $this->lastpage - 1;
				$this->data_sql = "SELECT * FROM $table WHERE $where LIMIT ".$this->start.", $limit";
			}
			public function getData()
			{
				$data = [];
				$a=mysqli_query($this->conn, $this->data_sql);
				while ($b=mysqli_fetch_array($a))
					$data[] = $b;
				return $data;
			}
			public function printPages()
			{
				$pagination = "";
				$counter = 0;
				if($this->lastpage > 1)
				{	
					$pagination .= "<div class=\"pagination\">";
					if ($this->page > 1) 
						$pagination.= "<a href=\"".$this->targetpage."&page=".$this->prev."\">« წინა</a>";
					else
						$pagination.= "<span class=\"disabled\">« წინა</span>";	
					
					if ($this->lastpage < 7 + ($this->adjacents * 2))
					{	
						for ($counter = 1; $counter <= $this->lastpage; $counter++)
						{
							if ($counter == $this->page)
								$pagination.= "<span class=\"current\">$counter</span>";
							else
								$pagination.= "<a href=\"".$this->targetpage."&page=$counter\">$counter</a>";					
						}
					}
					elseif($this->lastpage > 5 + ($this->adjacents * 2))
					{
						if($this->page < 1 + ($this->adjacents * 2))		
						{
							for ($counter = 1; $counter < 4 + ($this->adjacents * 2); $counter++)
							{
								if ($counter == $this->page)
									$pagination.= "<span class=\"current\">$counter</span>";
								else
									$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
							}
							$pagination.= "...";
							$pagination.= "<a href=\"".$this->targetpage."&page=".$this->lpm1."\">".$this->lpm1."</a>";
							$pagination.= "<a href=\"".$this->targetpage."&page=".$this->lastpage."\">".$this->lastpage."</a>";		
						}
						elseif($this->lastpage - ($this->adjacents * 2) > $this->page && $this->page > ($this->adjacents * 2))
						{
							$pagination.= "<a href=\"".$this->targetpage."&page=1\">1</a>";
							$pagination.= "<a href=\"".$this->targetpage."&page=2\">2</a>";
							$pagination.= "...";
							for ($counter = $this->page - $this->adjacents; $counter <= $this->page + $this->adjacents; $counter++)
							{
								if ($counter == $this->page)
									$pagination.= "<span class=\"current\">$counter</span>";
								else
									$pagination.= "<a href=\"".$this->targetpage."&page=$counter\">$counter</a>";					
							}
							$pagination.= "...";
							$pagination.= "<a href=\"".$this->targetpage."&page=".$this->lpm1."\">".$this->lpm1."</a>";
							$pagination.= "<a href=\"".$this->targetpage."&page=".$this->lastpage."\">".$this->lastpage."</a>";		
						}
						else
						{
							$pagination.= "<a href=\"".$this->targetpage."&page=1\">1</a>";
							$pagination.= "<a href=\"".$this->targetpage."&page=2\">2</a>";
							$pagination.= "...";
							for ($counter = $this->lastpage - (2 + ($this->adjacents * 2)); $counter <= $this->lastpage; $counter++)
							{
								if ($counter == $this->page)
									$pagination.= "<span class=\"current\">$counter</span>";
								else
									$pagination.= "<a href=\"".$this->targetpage."&page=$counter\">$counter</a>";					
							}
						}
					}
					if ($this->page < $counter - 1) 
						$pagination.= "<a href=\"".$this->targetpage."&page=".$this->next."\">შემდეგი »</a>";
					else
						$pagination.= "<span class=\"disabled\">წინა »</span>";
					$pagination.= "</div>\n";		
				}
				return $pagination;
			}
	}
?>