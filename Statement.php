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
 * This interface is common for RDF statement. It represents a 3-tuple and 4-tuple. A 3-tuple consists
 * of subject, predicate and object, whereas a 4-tuple is a 3-tuple but also contains a graph.
 *
 * @api
 *
 * @since 0.1
 */
interface Statement
{
    /**
     * Returns Statements subject.
     *
     * @return Node subject node
     *
     * @api
     *
     * @since 0.1
     */
    public function getSubject(): Node;

    /**
     * Returns Statements predicate.
     *
     * @return Node predicate node
     *
     * @api
     *
     * @since 0.1
     */
    public function getPredicate(): Node;

    /**
     * Returns Statements object.
     *
     * @return Node object node
     *
     * @api
     *
     * @since 0.1
     */
    public function getObject(): Node;

    /**
     * Returns Statements graph, if available.
     *
     * @return Node|null graph node, if available
     *
     * @api
     *
     * @since 0.1
     */
    public function getGraph();

    /**
     * If this statement consists of subject, predicate, object and graph, this function returns true,
     * false otherwise.
     *
     * @return bool true, if this statement consists of subject, predicate, object and graph, false otherwise
     *
     * @api
     *
     * @since 0.1
     */
    public function isQuad(): bool;

    /**
     * If this statement consists of subject, predicate and object, but no graph, this function returns true,
     * false otherwise.
     *
     * @return bool true, if this statement consists of subject, predicate and object, but no graph, false otherwise
     *
     * @api
     *
     * @since 0.1
     */
    public function isTriple(): bool;

    /**
     * Returns true if neither subject, predicate, object nor, if available, graph, are patterns.
     *
     * @return bool true, if neither subject, predicate, object nor, if available, graph, are patterns,
     *              false otherwise
     *
     * @api
     *
     * @since 0.1
     */
    public function isConcrete(): bool;

    /**
     * Returns true if at least subject, predicate, object or, if available, graph, are patterns.
     *
     * @return bool true, if at least subject, predicate, object or, if available, graph, are patterns,
     *              false otherwise
     *
     * @api
     *
     * @since 0.1
     */
    public function isPattern(): bool;

    /**
     * Get a valid NQuads serialization of the statement. If the statement is not concrete i.e. it contains variable
     * parts this method will throw an exception.
     *
     * @throws \Exception if the statment is not concrete
     *
     * @return string a string representation of the statement in valid NQuads syntax
     *
     * @api
     *
     * @since 0.1
     */
    public function toNQuads(): string;

    /**
     * Get a string representation of the current statement. It should contain a human readable description of the parts
     * of the statement.
     *
     * @return string a string representation of the statement
     *
     * @api
     *
     * @since 0.1
     */
    public function __toString(): string;

    /**
     * Returns true, if the given argument matches the is statement-pattern.
     *
     * @param Statement $toCompare the statement to where this pattern shoul be applied to
     *
     * @api
     *
     * @since 0.1
     */
    public function matches(Statement $toCompare): bool;

    /**
     * Checks if a given Statement instance is equal to this instance.
     *
     * @param Statement $toCompare the statement to compare with
     *
     * @return bool true, if the given Statement instance is equal to this one
     *
     * @api
     *
     * @since 0.1
     */
    public function equals(Statement $toCompare): bool;

    /**
     * Create an array representation of the Statement instance. Values for s, p, o, g are reduced,
     * e.g. use only URI if NamedNode.
     *
     * @return array
     *
     * @api
     *
     * @since 2.0.0
     */
    public function toArray(): array;
}
