<?php

namespace Tekkie\PlayBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Description of ProductRepository
 *
 * @author georgiana
 */
class ProductRepository extends EntityRepository {
    
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM TekkiePlayBundle:Product p ORDER BY p.name DESC')
            ->getResult();
    }
    
}

?>
