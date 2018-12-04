<?php

    echo "<thead>";
        echo "<tr>";
            
            if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Estudante") {

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
                        echo "Usuário";
                        echo "</th>";
                        continue;
                    }

                    if ($key == "idestudante") {
                        echo "Ações";
                        echo "</th>";
                        continue;
                    }
                    echo ucfirst($key);
                    echo "</th>";
                }
            } else {

                foreach ($_SESSION["lista_usuarios"][0] as $key => $value) {
                    echo "<th>";
                    if ($key == "dtregistro") {
                        echo "Data de cadastro";
                        echo "</th>";
                        continue;
                    }
                    if ($key == "idusuario") {
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

                        if ($key == "idestudante") {
                            $_SESSION["idestudante"] = $value;
                            $idestudante = $value;
                            $idusuario = $_SESSION["idusuario"];
                            echo "<a class='ui negative button' href='actions.php?action=apagar_estudante&idusuario=$idusuario&idestudante=$idestudante' role='button'>Deletar</a> ";;
                            echo "</td>";
                            continue;
                        }

                        if ($key == "idusuario") {
                            $_SESSION["idusuario"] = $value;
                            echo "<a class='ui primary button inscreverButton' href='painel_administrador.php?preview_dados=sim&idusuario=$value' role='button'><i class='user icon'></i></a> ";
                            echo "</td>";
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
                        if ($key == "dtregistro") {
                            $dateConvert = new DateTime($value);
                            $dataConvertida = $dateConvert->format("d/m/Y");
                            echo $dataConvertida;
                            echo "</td>";
                            continue;
                        }
                        if ($key == "idusuario") {
                            echo "<a class='ui negative button' href='actions.php?action=apagar_usuario&idusuario=$value' role='button'>Deletar</a> ";
                            continue;
                        }
                        echo $value;
                        echo "</td>";
                    }
                echo "</tr>";
            }
        }

    echo "</tbody>";