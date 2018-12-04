<?php

    echo "<thead>";

        echo "<tr>";

            if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Estudante") {
                if (!count($_SESSION["lista_usuarios"]) > 0) {
                    echo "<p> Não há nenhum estudante cadastrado... </p>";
                }
                foreach ($_SESSION["lista_usuarios"][0] as $key => $value) {
                    echo "<th>";
                        if ($key == "dtnascimento") {
                            echo "Data de nascimento";
                            echo "</th>";
                            continue;
                        }

                        if ($key == "idcurso") {
                            echo "Curso";
                            echo "</th>";
                            continue;
                        }

                        if ($key == "endereco") {
                            echo "Endereço";
                            echo "</th>";
                            continue;
                        }

                        if ($key == "idusuario") {
                            continue;
                        }
                        
                        if ($key == "idestudante") {
                            continue;
                        }
                        echo ucfirst($key);
                        echo "</th>";
                }
            } else {
                if (!count($_SESSION["lista_usuarios"]) > 0) {
                    echo "<h3> Não há nenhum pedido de inscrição... </h3>";
                }

                foreach ($_SESSION["lista_usuarios"][0] as $key => $value) {
                    echo "<th>";

                    if ($key == "dtnascimento") {
                        echo "Data de nascimento";
                        echo "</th>";
                        continue;
                    }

                    if ($key == "idcurso") {
                        echo "Curso";
                        echo "</th>";
                        continue;
                    }

                    if ($key == "endereco") {
                        echo "Endereço";
                        echo "</th>";
                        continue;
                    }

                    if ($key == "idinscricao") {
                        echo "Ações";
                        echo "</th>";
                        continue;
                    }

                    echo ucfirst($key);
                    echo "</th>";
                }
            }

        echo "</tr>";
    
    echo "</thead>";

    echo "<tbody>";
            
            if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Estudante") {
                foreach ($_SESSION["lista_usuarios"] as $usuario) {
                    echo "<tr>";
                        foreach ($usuario as $key => $value) {
                            echo "<td>";

                            if ($key == "dtnascimento") {
                                $dateConvert = new DateTime($value);
                                $dataConvertida = $dateConvert->format("d/m/Y");
                                echo $dataConvertida;
                                echo "</td>";
                                continue;
                            }

                            if ($key == "idcurso") {
                                if ($value == 1) {
                                    echo "Teatro";  
                                } else if ($value == 2){
                                    echo "Dança";
                                } else if ($value == 3){
                                    echo "Música";
                                } else {
                                    echo "Artes";
                                }
                                continue;
                            }

                            if ($key == "biografia") {
                                echo '<div class="ui fluid accordion">';
                                    echo '<div class="title">';
                                        echo '<i class="dropdown icon"></i>';
                                        echo "Biografia do estudante";
                                    echo '</div>';
                                    echo '<div class="content"';
                                        echo '<p>' . $value . '</p>';
                                    echo '</div>';
                                echo '</div>';
                                echo '</td>';
                                continue;
                            }

                            if ($key == "idusuario" || $key == "idestudante") {
                                continue;
                            }
                            echo $value;
                            echo "</td>";
                        }
                    echo "</tr>";
                }
            } else {
                foreach ($_SESSION["lista_usuarios"] as $usuario) {
                    echo "<tr>";
                        foreach ($usuario as $key => $value) {
                            echo "<td>";
                            if ($key == "dtnascimento") {
                                $dateConvert = new DateTime($value);
                                $dataConvertida = $dateConvert->format("d/m/Y");
                                echo $dataConvertida;
                                echo "</td>";
                                continue;
                            }

                            if ($key == "idcurso") {
                                if ($value == 1) {
                                    echo "Teatro";  
                                } else if ($value == 2){
                                    echo "Dança";
                                } else if ($value == 3){
                                    echo "Música";
                                } else {
                                    echo "Artes";
                                }
                                continue;
                            }

                            if ($key == "biografia") {
                                echo '<div class="ui fluid accordion">';
                                    echo '<div class="title">';
                                        echo '<i class="dropdown icon"></i>';
                                        echo "Biografia do estudante";
                                    echo '</div>';
                                    echo '<div class="content"';
                                        echo '<p>' . $value . '</p>';
                                    echo '</div>';
                                echo '</div>';
                                echo '</td>';
                                continue;
                            }

                            if ($key == "idinscricao") {
                                echo "<a class='ui positive button inscreverButton' href='painel_organizador.php?gerar_preview=sim&idinscricao=$value' role='button'>Aprovar</a> ";
                                echo "<a class='ui negative button' href='actions.php?action=apagar_inscricao&idinscricao=$value' role='button'>Deletar</a> ";
                                continue;
                            }
                            echo $value;
                            echo "</td>";
                        }
                    echo "</tr>";
                }
            }
    echo "</tbody>";