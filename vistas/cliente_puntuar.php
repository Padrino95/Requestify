<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<section class="container mt-5">
    <h2>Puntuar Proyecto</h2>
    <form action="../controladores/cliente_puntuar.php" method="POST">
        <div class="mb-3">
            <input type="hidden" name="cod" value="<?php echo $_GET['proyecto'] ; ?>" >
        </div>
        <div class="mb-3">
            <label class="form-label">Puntuación:</label>
            <div class="star-rating">
                <input type="radio" name="puntuacion" id="star5" value="5" required><label for="star5" class="fas fa-star"></label>
                <input type="radio" name="puntuacion" id="star4" value="4" required><label for="star4" class="fas fa-star"></label>
                <input type="radio" name="puntuacion" id="star3" value="3" required><label for="star3" class="fas fa-star"></label>
                <input type="radio" name="puntuacion" id="star2" value="2" required><label for="star2" class="fas fa-star"></label>
                <input type="radio" name="puntuacion" id="star1" value="1" required><label for="star1" class="fas fa-star"></label>
            </div>
        </div>
        <div class="mb-3">
            <label for="comentario" class="form-label">Comentario:</label>
            <textarea class="form-control" id="comentario" name="comentario" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="puntuar">Enviar Puntuación</button>
    </form>
</section>
