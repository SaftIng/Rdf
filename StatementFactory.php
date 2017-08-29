<?php

/*
 * This file is part of Saft.
 *
 * (c) Konrad Abicht <hi@inspirito.de>
 * (c) Natanael Arndt <arndt@informatik.uni-leipzig.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Saft\Rdf;

/**
 * The StatementFactory interface abstracts the creating of new instances of RDF statements by hiding different
 * implementation details.
 *
 * @api
 * @package Saft\Rdf
 * @since 0.1
 */
interface StatementFactory
{
    /**
     * Creates a new statement, either a 3-tuple or 4-tuple.
     *
     * @param Node $subject Subject of the statement.
     * @param Node $predicate Predicate of the statement.
     * @param Node $object Object of the statement.
     * @param Node $graph Graph of the statement. (optional)
     * @return Statement Instance of Statement.
     * @api
     * @since 0.1
     */
    public function createStatement(Node $subject, Node $predicate, Node $object, Node $graph = null);
}
