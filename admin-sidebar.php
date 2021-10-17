<div class="bg-info p-5">
                    <p class="lead text-center text-light">
                        TOTAL NUMBER OF BOOKS
                    </p>
                    <p class="text-center display-4">
                        <?php
                        $count = 0;
                        foreach (dynamic_select('books') as $row) :
                            $count = $count + $row['book_count'];
                        endforeach;
                        echo $count;
                        ?>
                    </p>

                </div>
                <div class="bg-secondary p-5 mt-3">
                    <p class="lead text-center text-light">
                        TOTAL BORROWED BOOKS
                    </p>
                    <p class="text-center display-4">
                        <?php
                        if (count_borrowed_table_data('BORROWED') == !FALSE) {
                            echo count(count_borrowed_table_data('BORROWED'));
                        } else {
                            echo 0;
                        }
                        ?>
                    </p>

                </div>
                <div class="bg-success p-5 mt-3">
                    <p class="lead text-center text-light">
                        TOTAL AVAILABLE BOOKS
                    </p>
                    <p class="text-center display-4">
                        <?php
                        if (count_borrowed_table_data('BORROWED') == !FALSE) {
                            echo $count - count(count_borrowed_table_data('BORROWED'));
                        } else {
                            echo $count;
                        }
                        ?>
                    </p>

                </div>